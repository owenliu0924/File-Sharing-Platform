<?php
require_once 'view/header.php'; 
?>

<form action="core/upload.php" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <input class="btn btn-primary" type="file" name="fileToUpload" id="fileToUpload">
    <input class="btn btn-primary" type="submit" value="上傳檔案" name="submit">
</form>
<?php
require_once 'view/footer.php'; 
?>
