<?php
$page = (pathinfo(__file__)['filename']);
include("head.php");
include("function.php");
//if (isset($_SESSION['user_id']))
 ?>
    <main>

        user image
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="upload" accept="image/png, image/jpeg, image/gif" />
            
            <input type="submit" value="submit" />
        </form>
        edit email
        edit password

    </main> 
<?php
  include("footer.php")
 ?>