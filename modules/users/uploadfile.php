<?php
// Kiểm tra xem form đã được submit chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Kiểm tra xem có file nào được tải lên không
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
        
        // Thiết lập thư mục để lưu file
        $targetDirectory = "uploads/";
        
        // Đảm bảo thư mục tồn tại, nếu không tạo mới
        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        // Lấy tên file gốc
        $fileName = basename($_FILES['fileToUpload']['name']);
        
        // Đường dẫn lưu file
        $targetFile = $targetDirectory . $fileName;

        // Lấy loại file (phần mở rộng)
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Kiểm tra loại file (có thể thêm các loại file được phép ở đây)
        $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx'];
        if (!in_array($fileType, $allowedFileTypes)) {
            echo "Chỉ cho phép các loại file: jpg, jpeg, png, gif, pdf, doc, docx.";
        } else {
            // Di chuyển file từ thư mục tạm đến thư mục đích
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
                echo "File " . htmlspecialchars($fileName) . " đã được tải lên thành công!";
            } else {
                echo "Có lỗi xảy ra khi tải file.";
            }
        }
    } else {
        echo "Không có file nào được tải lên hoặc file bị lỗi.";
    }
}
?>

<!-- Form HTML cho phép chọn file và upload -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <h2>Tải file lên server</h2>
    
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="fileToUpload">Chọn file để tải lên:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br><br>
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>
