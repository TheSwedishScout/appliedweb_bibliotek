<?php
$page = (pathinfo(__file__)['filename']);
include("./head.php");
    include('../assets/function.php');
if (isset($_SESSION['user_id'])){
    if(isset($_FILES['upload'])){
        $file_uri = upload_image($_FILES['upload'],"../images/uploaded/");
    }
 ?>
    <main>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="upload" accept="image/png, image/jpeg, image/gif" /> max 8MB
            
            <input type="submit" value="submit" />
        </form>
        <?php } ?>
        <div class="gallery"> 
            <?php 
                $images = array_diff(scandir('../images/uploaded'), array('.', '..'));
                //var_dump($images);
                foreach ($images as $image) {
                    ?>
                    <img src="../images/uploaded/<?php echo "{$image}" ?>">
                    <?php
                }
            ?>
        </div>
    </main> 
<?php
    include("footer.php")
 ?>