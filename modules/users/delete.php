<?php
$body=getBody();
$userId=$body['id'];
$sql="SELECT * FROM users WHERE id='$userId'";
$check=query($sql);
if(!empty($check))
{
    $delete=delete('users',"id='$userId'");
    if(!empty($delete)){
        header("Location:?module=users&action=lists");
    }
}
?>