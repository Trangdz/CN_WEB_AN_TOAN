<?php
require_once 'pages/head.php';

// Kiểm tra xem có tham số "view" không
if (isset($_GET['view'])) {
    $id = $_GET['view'];

    // Truy vấn để lấy file theo ID
    $file = query("SELECT * FROM upload WHERE id = ?", [$id])->fetch();

    if ($file) {
        $file_name = $file['file_name'];
        $file_type = $file['file_type'];
        $file_data = $file['file_data'];

        // Kiểm tra kiểu MIME
        echo "<p>File type: " . $file_type . "</p>";

        // Hiển thị tiêu đề
        echo "<h2>Xem nội dung file: $file_name</h2>";

        // Xử lý hiển thị dựa trên loại file
        if (strpos($file_type, 'image/') === 0) {
            // Nếu là hình ảnh, hiển thị hình ảnh
            echo '<img src="data:' . $file_type . ';base64,' . base64_encode($file_data) . '" alt="' . $file_name . '" />';
        } elseif (strpos($file_type, 'text/') === 0 || $file_type == 'application/pdf') {
            // Nếu là file văn bản hoặc PDF, hiển thị trong iframe
            echo '<iframe src="data:' . $file_type . ';base64,' . base64_encode($file_data) . '" width="100%" height="600px"></iframe>';
        } else {
            // Nếu không hỗ trợ hiển thị trực tiếp
            echo "<p>Không thể hiển thị nội dung của loại file này.</p>";
        }
    } else {
        echo "File không tồn tại.";
    }
} else {
    echo "Không tìm thấy tham số 'view'.";
}

require_once 'pages/footer.php';
?>
