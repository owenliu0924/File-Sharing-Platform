<?php
if (isset($_GET['q'])) {
    $filename = $_GET['q'];
    $file_path = 'upload/' . $filename;

    if (file_exists($file_path)) {
        $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);

        if (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
            echo '<video width="320" height="240" controls>
                  <source src="' . $file_path . '" type="video/mp4">
                  你的瀏覽器不支援影片播放。
                </video>';
        } elseif (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo '<img src="' . $file_path . '" alt="Image">';
        } elseif (in_array($file_extension, ['mp3', 'wav', 'ogg'])) {
            echo '<audio controls>
                  <source src="' . $file_path . '" type="audio/mpeg">
                  你的瀏覽器不支援音訊播放
                </audio>';
        } else {
            echo '檔案無法顯示，<a href="' . $file_path . '" download>點擊這裡下載</a>';
        }
    } else {
        echo '檔案不存在。';
    }
} else {
    echo '你的 Param 呢？';
}
?>
