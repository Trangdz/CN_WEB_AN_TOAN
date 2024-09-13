<?php
require_once 'pages/head.php';

// Hiển thị danh sách file đã upload
$uploaded_files = query("SELECT * FROM upload ORDER BY upload_time DESC");

if ($uploaded_files->rowCount() > 0) {
    echo "<h3>Danh sách file đã tải lên:</h3>";
    echo "<ul>";
    while ($file = $uploaded_files->fetch()) {
        echo "<li><a href='index.php?module=file&action=upload_view&view=" . $file['id'] . "'>" . $file['file_name'] . "</a> - " . $file['upload_time'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Chưa có file nào được tải lên.";
}

require_once 'pages/footer.php';
?>
