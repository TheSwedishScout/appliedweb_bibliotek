<?php
$page = (pathinfo(__file__)['filename']);
include("head.php");
include("function.php");
if (isset($_SESSION['user_id'])){
include ('uploadimage.php');
 ?>
    <main>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="upload" accept="image/png, image/jpeg, image/gif" />
            
            <input type="submit" value="submit" />
        </form>
        <?php } ?>
        <div class="gallery"> 
            <?php 
                $images = array_diff(scandir('images/uploaded'), array('.', '..'));
                //var_dump($images);
                foreach ($images as $image) {
                    ?>
                    <img src="images/uploaded/<?php echo "{$image}" ?>">
                    <?php
                }
            ?>
        </div>
    </main> 
<?php
  include("footer.php")
 ?>