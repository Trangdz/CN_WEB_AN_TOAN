<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap 5 Dropdown</title>
  <!-- Bootstrap 5 CSS -->
  <link href="modules/users/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      margin: 30px;
      text-align: center;
    }
    .container {
      margin: 20px;
      padding: 10px;
      border-radius: 10px;
      border: 2px solid black;
    }
    .button-click {
      margin: 20px;
      position: relative;
      right: 450px;
    }
    .add-user {
      margin-right: 20px;
      padding-left: 110px;
      padding-right: 110px;
    }
    img {
      width: 100%;  /* Chiếm toàn bộ chiều ngang của thẻ chứa */
      height: auto; /* Giữ nguyên tỷ lệ khung hình của ảnh */
      object-fit: cover; /* Đảm bảo ảnh được cắt vừa với kích thước của thẻ chứa mà vẫn giữ tỷ lệ */
      display: block; /* Loại bỏ khoảng cách dưới ảnh (do inline-block) */
    }
  </style>
</head>
<body>

  <ul class="nav nav-tabs tool-bar">
    <li class="nav-item">
      <a class="nav-link active" href="?module=users&action=lists">List users</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="" role="button" aria-expanded="false">Change data</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="?module=users&action=new">Add user</a></li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">User Authorization</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Add role</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="" role="button" aria-expanded="false">File</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="?module=users&action=new">Upload file</a></li>
        <li><a class="dropdown-item" href="#">Show file uploaded</a></li>
      </ul>
    </li>
  </ul>

  <img class="img-head" src="http://localhost/baitaptrenlop/image/bannerQuoctangBacTrong.jpg" alt="Banner Image">

  <!-- Bootstrap 5 JS and dependencies -->
 


