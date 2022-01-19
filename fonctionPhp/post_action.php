<?php
include('fonction.php');
session_start();
include '../Classes/Utilisateur.php';
$user = new Utilisateur($mysqli, $_SESSION['id']);
$_SESSION["user_id"] = $user->getId();
$_SESSION["user_name"] = $user->getpseudo();
$connect = new PDO("mysql:host=mysql-amine95.alwaysdata.net;dbname=amine95_netlife", "amine95", "Marseille95");

	if ($_POST['action'] != 'update' && $_POST['action'] != 'load_url_content' && $_POST['action'] != 'del_post') {
		sleep(1);
		$data = array(
			':user_id'		=>	$_SESSION["user_id"],
			':post_content'	=>	clean_text($_POST["content"]),
			':post_code'	=>	md5(uniqid()),
			':post_datetime' =>	get_date()
		);

		$query = "
		INSERT INTO posts_table 
		(user_id, post_content, post_code, post_datetime) 
		VALUES (:user_id, :post_content, :post_code, :post_datetime)
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		$output = array(
			'content'	=>	html_entity_decode(clean_text($_POST["content"])),
			'user_image' =>	Get_user_avatar($_SESSION["user_id"], $connect),
			'user_name'	=>	$_SESSION["user_name"]
		);

		echo json_encode($output);
	}

	if ($_POST["action"] == 'load_url_content') {
		$html = file_get_contents_curl($_POST["url"][0]);

		$doc = new DOMDocument();

		@$doc->loadHTML($html);

		$nodes = $doc->getElementsByTagName('title');

		$title = $nodes->item(0)->nodeValue;

		$description = '';

		$media = '';

		$link = $_POST['url'][0];

		$metas = $doc->getElementsByTagName('meta');

		for ($i = 0; $i < $metas->length; $i++) {
			$meta_tag = $metas->item($i);

			if ($meta_tag->getAttribute('name') == 'description') {
				$description = $meta_tag->getAttribute('content');
			}

			if ($meta_tag->getAttribute('property') == 'og:description') {
				$description = $meta_tag->getAttribute('content');
			}

			if ($meta_tag->getAttribute('name') == 'twitter:description') {
				$description = $meta_tag->getAttribute('content');
			}

			if ($meta_tag->getAttribute('property') == 'og:video:url') {
				$media = '
				<div class="embed-responsive embed-responsive-16by9">
					  	<iframe class="embed-responsive-item" src="' . $meta_tag->getAttribute('content') . '"></iframe>
					</div>
				';
			}

			if ($media == '') {
				if ($meta_tag->getAttribute('property') == 'og:image') {
					$media = '
					<div align="center"><img src="' . $meta_tag->getAttribute('content') . '" class="img-responsive" /></div>
					';
				}
			}
		}

		if ($media == '') {
			$media = '
			<div align="center"><img src="../images/image-not-found.jpg" class="img-responsive" /></div>
			';
		}

		$output = array(
			'title'		=>	$title,
			'description'	=>	$description,
			'media'		=>	$media,
			'link'		=>	$link
		);

		echo json_encode($output);
	}

	if ($_POST['action'] == 'update') {
		$data = array(
			':post_content'		=>	clean_text($_POST["content"]),
			':post_id'			=>	$_POST["post_id"]
		);

		$query = "
		UPDATE posts_table 
		SET post_content = :post_content 
		WHERE posts_id = :post_id
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		$fetch_media = "
		SELECT * FROM media_table 
		WHERE post_id = '" . $_POST['post_id'] . "'
		";

		$result = $connect->query($fetch_media);

		$media_array = array();

		foreach ($result as $row) {
			$media_array[] = $row["media_path"];
		}

		$temp_id = rand();

		$output = array(
			'content'		=>	html_entity_decode(clean_text($_POST["content"])) . '<br /><br /><div id="' . $temp_id . '"></div>',
			'user_image'	=>	Get_user_avatar($_SESSION["user_id"], $connect),
			'user_name'		=>	$_SESSION["user_name"],
			'media_array'	=>	$media_array,
			'temp_id'		=>	$temp_id
		);

		echo json_encode($output);
	}
	if ($_POST["action"] == 'del_post') {

		$query = "
		DELETE FROM posts_table
		WHERE (posts_id='" . $_POST['id_posts'] . "' AND user_id='" . $_POST['user_id'] . "')
		";



		$connect->query($query);
	}


?>

