<?php

?>

<script>
    $(document).ready(function () {
        $('#import_table').DataTable();
    });
</script>

<div class="jumbotron">

    <div class="row">
        <form method="post" action="import" enctype="multipart/form-data">
                <div class="col-md-12 post_block">
                    <div class="col-md-7">
                        <input type="file" name="filename">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="Submit" value="Import">
                    </div>
                </div>
        </form>
    </div>
</div>



