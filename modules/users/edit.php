<?php
require_once 'pages/head.php';
$infor = '';
$errors = '';
// $body=getBody();
//     var_dump($body);

$body = getBody();
var_dump($body);
$userId = $body['id'];
$sql = "SELECT * FROM users WHERE id = '$userId'";
$data = firstRaw($sql);

if (empty($data)) {
    $errors = "User not exist";
} else {
    $fullname = $data['username'];
    $phone = $data['phone'];
    $email = $data['email'];
    $role = $data['role'];
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $body = getBody();

    if (!empty($body)) {

        $data = [
            'username' => $body['fullname'],
            'phone' => $body['phone'],
            'email' => $body['email'],
            'role' => $body['role']
        ];
        if (!empty($body['password'])) {
            $password = password_hash($body['password'], PASSWORD_DEFAULT);
            $data['password'] = $password;
        }
        $inserData = update('users', $data, "id='$userId'");
        if (!empty($inserData)) {
            $infor = "You have inserted successfull";
            $fullname = $body['fullname'];
            $phone = $body['phone'];
            $email = $body['email'];
            $role = $body['role'];
        } else {
            $infor = "You haven't inserted successfull";
        }
    }
}
?>
<div class='container'>

    <?php
    echo $infor;
    echo $errors;
    ?>
    <h3>Update user</h3>
    <form action="" method='post'>
        <div class="row">
            <div class='col'>
                <div class='form-group'>
                    <label>Fullname</label>
                    <input type='text' class='form-control' name='fullname' placeholder="fullname" value="<?php echo $fullname; ?>">

                </div>

                <div class='form-group'>
                    <label>Phone Number</label>
                    <input type='text' class='form-control' name='phone' placeholder="phone" value="<?php echo $phone; ?>">

                </div>


                <div class='form-group'>
                    <label>Email</label>
                    <input type='text' class='form-control' name='email' placeholder="email" value="<?php echo $email; ?>">

                </div>
            </div>

            <div class='col'>
                <div class='form-group'>
                    <label>Password</label>
                    <input type='password' class='form-control' name='password' placeholder="password" value="">

                </div>

                <div class='form-group'>
                    <label>Confirm Password</label>
                    <input type='password' class='form-control' name='confirmpassword' placeholder="confirm password" value="">

                </div>

                <div class="form-group">
                    <label for="Role">Role</label>
                    <select id="role" name="role" class="form-control">

                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="1">2</option>
                    </select>
                </div>

            </div>
        </div>
        <div class='button-submit'>
            <button class="btn btn-primary add-user" type="submit">Update User</button>
            <a href=<?php echo  'http://localhost/baitaptrenlop/index.php?module=users&action=menu' ?> class='btn btn-success'>Back</a>
        </div>
    </form>
</div>
<?php
require_once 'pages/footer.php';
?>