<?php
include('../include/header.inc.php');
?>

<div class="row">
    <div class="col-md-10 col-centered">
        <h3>Fil d'actualité amis:</h3>
        <div id="search_result_area">
            <div class="wrapper-preview">
                <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        load_data(1);

        function load_data(page) {
            $.ajax({
                url: "../fonctionPhp/tl_action.php",
                method: "POST",
                data: {
                    page: page,
                    action: 'tl_ami'
                },
                success: function(data) {
                    $('#search_result_area').html(data);
                }
            })
        }

        $(document).on('click', '.page-link', function() {
            var page = $(this).data('page_number');

            if (page > 0) {
                load_data(page);
            }
        });
    });
</script>


<?php
include('../include/footer.inc.php');
?>