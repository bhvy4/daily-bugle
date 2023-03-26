<?php
//$tag_sql = "SELECT * FROM tags";
//$tags = mysqli_query($conn, $tag_sql);
?>
<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Tags</h3>
    </div>
    <div class="d-flex flex-wrap m-n1">
        <?php tags(); ?>
           
        <?php ?>
    </div>
</div>