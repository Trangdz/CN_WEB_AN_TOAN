<?php
require_once 'pages/head.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['files'])) {
        $files = $_FILES['files'];

        // Lặp qua từng file được tải lên
        for ($i = 0; $i < count($files['name']); $i++) {
            if ($files['error'][$i] == 0) { // Kiểm tra nếu không có lỗi
                // Lấy thông tin của từng file
                $file_name = basename($files['name'][$i]); // Lấy tên file
                $file_type = $files['type'][$i]; // Lấy loại file
                $file_data = file_get_contents($files['tmp_name'][$i]); // Lấy nội dung file
                $upload_time = date('Y-m-d H:i:s'); // Thời gian tải lên

                // Chuẩn bị mảng dữ liệu để chèn vào cơ sở dữ liệu
                $dataInsert = [
                    'file_name' => $file_name,
                    'file_type' => $file_type,
                    'file_data' => $file_data,
                    'upload_time' => $upload_time,
                ];

                // Gọi hàm insert để chèn dữ liệu vào bảng upload
                $insertData = insert('upload', $dataInsert);

                if ($insertData) {
                    echo "File $file_name đã được tải lên và lưu trữ thành công.<br>";
                } else {
                    echo "Có lỗi xảy ra khi lưu file $file_name.<br>";
                }
            } else {
                echo "Có lỗi xảy ra khi tải file " . $files['name'][$i] . "<br>";
            }
        }
    }
}
?>

<h2>Upload Multiple Files</h2>
<p>(Bài toán: Upload 10 file, in danh sách tên 10 file và đường dẫn download file)</p>

<form action="" method="post" enctype="multipart/form-data">
    <!-- Tạo 10 trường nhập file -->
    <?php for ($i = 1; $i <= 10; $i++): ?>
        <div class="file-input">
            File <?= $i ?>: <input type="file" name="files[]" required><br>
        </div>
    <?php endfor; ?>

    <!-- Nút Reset và Upload -->
    <div class="buttons">
        <button type="reset">Reset</button>
        <button type="submit">Upload</button>
    </div>
</form>

<?php

require_once 'pages/footer.php';
?>
