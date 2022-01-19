<?php
include('fonction.php');
session_start();
include '../Classes/Utilisateur.php';
$user = new Utilisateur($mysqli, $_SESSION['id']);
$_SESSION["user_id"] = $user->getId();
$connect = new PDO("mysql:host=mysql-amine95.alwaysdata.net;dbname=amine95_netlife", "amine95", "Marseille95");


if (isset($_POST["page"])) {
    if ($_POST["action"] == "tl_ami") {
        $output = '';



        $limit = 50;

        $page = 1;

        if ($_POST['page'] > 1) {
            $start = (($_POST['page'] - 1) * $limit);
            $page = $_POST['page'];
        } else {
            $start = 0;
        }

        $query = "
    SELECT posts_table.posts_id, posts_table.user_id, posts_table.post_content, posts_table.post_type, posts_table.post_datetime FROM posts_table
    INNER JOIN friend_request
    ON friend_request.request_from_id=posts_table.user_id 
    OR friend_request.request_to_id=posts_table.user_id 
    WHERE (friend_request.request_from_id='" . $_SESSION["user_id"] . "' OR friend_request.request_to_id='" . $_SESSION["user_id"] . "') 
    AND friend_request.request_status='confirm' 
    GROUP BY posts_table.posts_id 
    ORDER by posts_table.posts_id DESC
    ";

        $filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

        $statement = $connect->prepare($query);

        $statement->execute();

        $total_data = $statement->rowCount();

        $statement = $connect->prepare($filter_query);

        $statement->execute();

        $result = $statement->fetchAll();

        if ($total_data > 0) {
            foreach ($result as $row) {
                $output .= '
            <div class="wrapper-box">
                <div class="row">
                    <div class="col-md-1 col-sm-3 col-xs-3">
                        ' . Get_user_avatar_big($row["user_id"], $connect) . '
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-5">
                        <div class="wrapper-box-title">' . html_entity_decode(clean_text($row["post_content"])) . '</div>
                        <div class="wrapper-box-description"><i> ' . Get_grid_image($row["posts_id"], $connect) . '  </i></div>
                        <div class="wrapper-box-description"><i>De : ' . Get_user_name($connect, $row["user_id"]) . '</i></div>
                        <div class="wrapper-box-description"><i>' . $row["post_datetime"] . '</i></div>
                        <button type="button" class="like" name="like_button" data-like_id="' . $row["posts_id"] . '" data-user_id="' . $row["user_id"] . '" id="like_button_' . $row["posts_id"] . '" class="btn btn-primary btn-sm"><i class="fas fa-heart"></i>J&apos;aime ' . Get_like_post($connect, $row["posts_id"]) . '</button>
                    </div>
                </div>
            </div>
                  ';
            }
        } else {
            $output .= '
        <div class="wrapper-box">
            <h4 align="center">Ajoutez des amis pour voir du contenu...</h4>
        </div>
        ';
        }
    }
    if ($_POST["action"] == "tl_public") {
        $output = '';



        $limit = 50;

        $page = 1;

        if ($_POST['page'] > 1) {
            $start = (($_POST['page'] - 1) * $limit);
            $page = $_POST['page'];
        } else {
            $start = 0;
        }

        $query = "
    SELECT posts_table.posts_id, posts_table.user_id, posts_table.post_content, posts_table.post_type, posts_table.post_datetime FROM posts_table
    ORDER by posts_table.posts_id DESC
    ";

        $filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

        $statement = $connect->prepare($query);

        $statement->execute();

        $total_data = $statement->rowCount();

        $statement = $connect->prepare($filter_query);

        $statement->execute();

        $result = $statement->fetchAll();

        if ($total_data > 0) {
            foreach ($result as $row) {
                $output .= '
            <div class="wrapper-box">
                <div class="row">
                    <div class="col-md-1 col-sm-3 col-xs-3">
                        ' . Get_user_avatar_big($row["user_id"], $connect) . '
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-5">
                        <div class="wrapper-box-title">' . html_entity_decode(clean_text($row["post_content"])) . '</div>
                        <div class="wrapper-box-description"><i> ' . Get_grid_image($row["posts_id"], $connect) . '  </i></div>
                        <div class="wrapper-box-description"><i>De : ' . Get_user_name($connect, $row["user_id"]) . '</i></div>
                        <div class="wrapper-box-description"><i>' . $row["post_datetime"] . '</i></div>
                        <button type="button" class="like" name="like_button" data-like_id="' . $row["posts_id"] . '" data-user_id="' . $row["user_id"] . '" id="like_button_' . $row["posts_id"] . '" class="btn btn-primary btn-sm"><i class="fas fa-heart"></i>J&apos;aime ' . Get_like_post($connect, $row["posts_id"]) . '</button>
                    </div>
                </div>
            </div>
                  ';
            }
        } else {
            $output .= '
        <div class="wrapper-box">
            <h4 align="center">Ajoutez des amis pour voir du contenu...</h4>
        </div>
        ';
        }
    }
    if ($_POST["action"] == "tl_me") {
        $output = '';



        $limit = 50;

        $page = 1;

        if ($_POST['page'] > 1) {
            $start = (($_POST['page'] - 1) * $limit);
            $page = $_POST['page'];
        } else {
            $start = 0;
        }

        $query = "
    SELECT posts_table.posts_id, posts_table.user_id, posts_table.post_content, posts_table.post_type, posts_table.post_datetime FROM posts_table
    WHERE user_id='" . $_SESSION["user_id"] . "'
    ORDER by posts_table.posts_id DESC
    ";

        $filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

        $statement = $connect->prepare($query);

        $statement->execute();

        $total_data = $statement->rowCount();

        $statement = $connect->prepare($filter_query);

        $statement->execute();

        $result = $statement->fetchAll();

        if ($total_data > 0) {
            foreach ($result as $row) {
                $output .= '
            <div class="wrapper-box">
                <div class="row">
                    <div class="col-md-1 col-sm-3 col-xs-3">
                        ' . Get_user_avatar_big($row["user_id"], $connect) . '
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-5">
                        <div class="wrapper-box-title">' . html_entity_decode(clean_text($row["post_content"])) . '</div>
                        <div class="wrapper-box-description"><i> ' . Get_grid_image($row["posts_id"], $connect) . '  </i></div>
                        <div class="wrapper-box-description"><i>De : ' . Get_user_name($connect, $row["user_id"]) . '</i></div>
                        <div class="wrapper-box-description"><i>' . $row["post_datetime"] . '</i></div>
                        <button type="button" class="like" name="like_button" data-like_id="' . $row["posts_id"] . '" data-user_id="' . $row["user_id"] . '" id="like_button_' . $row["posts_id"] . '" ><i class="fas fa-heart"></i>J&apos;aime ' . Get_like_post($connect, $row["posts_id"]) . '</button>
                        <button type="button" class="close3" data-id_posts="' . $row["posts_id"] . '" data-user_id="' . $row["user_id"] . '" aria-label="Close" id="del_button_' . $row["posts_id"] . '">
                        Supprimer post
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
                  ';
            }
        } else {
            $output .= '
        <div class="wrapper-box">
            <h4 align="center">Aucune publication postée </h4>
        </div>
        ';
        }
    }
    $output .= '
    <br />
    <div align="center">
        <ul class="pagination">
    ';

    $total_links = ceil($total_data / $limit);

    $previous_link = '';

    $next_link = '';

    $page_link = '';

    if ($total_links > 5) {
        if ($page < 5) {
            for ($count = 1; $count <= 5; $count++) {
                $page_array[] = $count;
            }
            $page_array[] = '...';
            $page_array[] = $total_links;
        } else {
            $end_limit = $total_links - 5;

            if ($page > $end_limit) {
                $page_array[] = 1;
                $page_array[] = '...';

                for ($count = $end_limit; $count <= $total_links; $count++) {
                    $page_array[] = $count;
                }
            } else {
                $page_array[] = 1;
                $page_array[] = '...';
                for ($count = $page - 1; $count <= $page + 1; $count++) {
                    $page_array[] = $count;
                }
                $page_array[] = '...';
                $page_array[] = $total_links;
            }
        }
    } else {
        for ($count = 1; $count <= $total_links; $count++) {
            $page_array[] = $count;
        }
    }

    for ($count = 0; $count < count($page_array); $count++) {
        if ($page == $page_array[$count]) {
            $page_link .= '
            <li class="page-item active">
                <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
            </li>
            ';

            $previous_id = $page_array[$count] - 1;

            if ($previous_id > 0) {
                $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Precedent</a></li>';
            } else {
                $previous_link = '
                <li class="page-item disabled">
                    <a class="page-link" href="#">Precedent</a>
                 </li>
                ';
            }

            $next_id = $page_array[$count] + 1;

            if ($next_id > $total_links) {
                $next_link = '
                <li class="page-item disabled">
                    <a class="page-link" href="#">Suivant</a>
                </li>
                ';
            } else {
                $next_link = '
                <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Suivant</a></li>
                ';
            }
        } else {
            if ($page_array[$count] == '...') {
                $page_link .= '
                <li class="page-item disabled">
                    <a class="page-link" href="#">...</a>
                 </li>
                ';
            } else {
                $page_link .= '
                <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
                ';
            }
        }
    }

    $output .= $previous_link . $page_link . $next_link;

    echo $output;
}
