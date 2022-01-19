<?php
include('../include/header.inc.php');

if (isset($_GET["id"])) {
    $id=$_GET["id"];
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="panel-title">Profile Details</h3>
                    <button type="button" class="close2" data-id_ami="<?php echo $id; ?>" aria-label="Close" style="position: absolute;top: 0;right: 18px;">
                    Supprimer ami
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <?php
            echo Get_user_profile_data_html2($_GET["id"], $connect);
            ?>
        </div>
    </div>
<?php
}

include('../include/footer.inc.php');
