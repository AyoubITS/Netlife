<?php
include('../include/header.inc.php');
$message = '';
if (isset($_POST["edit"])) {
    if (empty($_POST["pseudo"])) {
        $message = '<div class="alert alert-danger">Name is required</div>';
    } else {
        if (isset($_FILES["user_avatar"]["name"])) {
            if ($_FILES["user_avatar"]["name"] != '') {
                $image_name = $_FILES["user_avatar"]["name"];

                $valid_extensions = array('jpg', 'jpeg', 'png');

                $extension = pathinfo($image_name, PATHINFO_EXTENSION);

                if (in_array($extension, $valid_extensions)) {
                    $upload_path = '../avatar/' . time() . '.' . $extension;
                    if (move_uploaded_file($_FILES["user_avatar"]["tmp_name"], $upload_path)) {
                        $user_avatar = $upload_path;
                    }
                } else {
                    $message .= '<div class="alert alert-danger">Only .jpg, .jpeg and .png Image allowed to upload</div>';
                }
            } else {
                $user_avatar = $_POST["hidden_user_avatar"];
            }
        } else {
            $user_avatar = $_POST["hidden_user_avatar"];
        }

        if ($message == '') {
            $data = array(
                ':pseudo'    => $_POST["pseudo"],
                ':user_avatar'   => $user_avatar,
                ':user_birthdate'  => $_POST["user_birthdate"],
                ':sexe'   => $_POST["sexe"],
                ':user_city'    => $_POST["user_city"],
                ':bio' => $_POST["bio"],
                ':user_country'   => $_POST["user_country"],
                ':id_user' => $_POST["id_user"]
            );

            $query = "
   UPDATE Utilisateur 
   SET pseudo = :pseudo, 
   user_avatar = :user_avatar, 
   user_birthdate = :user_birthdate, 
   sexe = :sexe, 
   user_city = :user_city, 
   bio = :bio,
   user_country = :user_country
   WHERE id_user = :id_user
   ";

            $statement = $connect->prepare($query);

            $statement->execute($data);

            echo "<script>window.location.href='profil.php?action=view&success=1'</script>";
        }
    }
}

?>
<div class="row">
    <div class="col-md-9">
        <?php
        if (isset($_GET["action"])) {
            if ($_GET["action"] == "view") {
                if (isset($_GET["success"])) {
                    echo '
    <div class="alert alert-success">Profile Edited Successfully</div>
    ';
                }
        ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="panel-title">Profile Details</h3>
                            </div>
                            <div class="col-md-3" align="right">
                                <a href="profil.php?action=edit" class="btn btn-success btn-xs">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo Get_user_profile_data_html($_SESSION["user_id"], $connect);
                        ?>
                    </div>
                </div>
                <?php
            }

            if ($_GET["action"] == 'edit') {
                $result = Get_user_profile_data($_SESSION["user_id"], $connect);

                foreach ($result as $row) {
                ?>
                    <script>
                        $(document).ready(function() {

                            $('#sexe').val("<?php echo $row["sexe"]; ?>");

                            $('#user_country').val("<?php echo $row["user_country"]; ?>");

                            $('#user_birthdate').datepicker({
                                assumeNearbyYear: true,
                                format: 'yyyy-mm-dd'
                            });
                        });
                    </script>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-9">
                                    <h3 class="panel-title">Editer profil</h3>
                                </div>
                                <div class="col-md-3" align="right">
                                    <a href="profil.php?action=view" class="btn btn-primary btn-xs">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php
                            echo $message;
                            ?>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4" align="right">Pseudo</label>
                                        <div class="col-md-8">
                                            <input type="text" name="pseudo" id="pseudo" class="form-control" value="<?php echo $row["pseudo"];  ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4" align="right">Bio</label>
                                        <div class="col-md-8">
                                            <input type="text" name="bio" id="bio" class="form-control" value="<?php echo $row["bio"];  ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4" align="right">Date de naissance</label>
                                        <div class="col-md-8">
                                            <input type="text" name="user_birthdate" id="user_birthdate" class="form-control" readonly value="<?php echo $row["user_birthdate"]; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4" align="right">Genre</label>
                                        <div class="col-md-8">
                                            <select name="sexe" id="sexe" class="form-control">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4" align="right">Ville</label>
                                        <div class="col-md-8">
                                            <input type="text" name="user_city" id="user_city" class="form-control" value="<?php echo $row["user_city"];  ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4" align="right">Pays</label>
                                        <div class="col-md-8">
                                            <select name="user_country" id="user_country" class="form-control">
                                                <option value="">Selectionnez pays</option>
                                                <?php

                                                echo load_country_list();

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4" align="right">Photo de profil</label>
                                        <div class="col-md-8">
                                            <input type="file" name="user_avatar" />
                                            <br />
                                            <?php
                                            Get_user_avatar($row["id_user"], $connect);
                                            ?>
                                            <br />
                                            <input type="hidden" name="hidden_user_avatar" value="<?php echo $row["user_avatar"]; ?>" />
                                            <br />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" align="center">
                                    <input type="hidden" name="id_user" value="<?php echo $row["id_user"]; ?>" />
                                    <input type="submit" name="edit" class="btn btn-primary" value="Edit" />
                                </div>
                            </form>
                        </div>
                    </div>
        <?php
                }
            }
        }
        ?>
    </div>
    <div class="col-md-3">

    </div>
</div>
<?php
require '../include/footer.inc.php';
