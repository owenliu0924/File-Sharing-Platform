<?php
include '../config/main.php';
session_start();
$lastUploadTime = isset($_SESSION['last_upload_time']) ? $_SESSION['last_upload_time'] : 0;

$dir = "../upload/";

if (isset($_POST["submit"])) {
    $currentTime = time();
    if ($currentTime - $lastUploadTime >= $uploadInterval) {
        $_SESSION['last_upload_time'] = $currentTime;
        
        if (isset($_FILES["fileToUpload"])) {
            if ($_FILES["fileToUpload"]["size"] <= $maxFileSize) {
                $fileExtension = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
                $filename = generateRandomFilename($fileExtension);
                $file = $dir . $filename;
    
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
                    echo "上傳成功，檔案分享網址：" . $url . $filename;
                } else {
                    echo "上傳失敗";
                }
            } else {
                echo "文件大小超出限制。"; // 突然懶了，先不寫顯示最大允許大小了。
            }
            
        } else {
            echo "請選擇要上傳的檔案。";
        }
    } else {
        echo "每個小時只能上傳一次。";
    }
    
}

function generateRandomFilename($length = 16) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomFilename = '';

    for ($i = 0; $i < $length; $i++) {
        $randomFilename .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomFilename . '.' . $extension;
}

?>
