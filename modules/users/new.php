<?php
require_once 'pages/head.php';
$infor='';
// $body=getBody();
//     var_dump($body);
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $body=getBody();
  
    if(!empty($body))
    {
        $password=password_hash($body['password'],PASSWORD_DEFAULT);
        $data=[
            'username' => $body['fullname'],
            'phone' => $body['phone'],
            'email' => $body['email'],
            'password' =>  $password,
            'role' => $body['role']
        ];
        $inserData=insert('users',$data);
        if(!empty($inserData))
        {
            $infor="You have inserted successfull";
        }
        else
        {
            $infor="You haven't inserted successfull";
        }
    }
}

?>
<div class='container'>
    
    <?php
     echo $infor;
    ?>
    <form action="" method='post'>
        <h3>Add user</h3>
        <div class="row">
            <div class='col'>
                <div class='form-group'>
                    <label>Fullname</label>
                    <input type='text' class='form-control' name='fullname' placeholder="fullname" value="">
                  
                </div>

                <div class='form-group'>
                    <label>Phone Number</label>
                    <input type='text' class='form-control' name='phone' placeholder="phone" value="">
                   
                </div>
               

                <div class='form-group'>
                    <label>Email</label>
                    <input type='text' class='form-control' name='email' placeholder="email" value="">
                   
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

                        <option value="0" >0</option>
                        <option value="1" >1</option>
                        <option value="1" >2</option>
                    </select>
                </div>
              
            </div>
        </div>
        <div class='button-submit button-click'>
            <button class="btn btn-primary add-user" type="submit">Update User</button>
            <a href=<?php echo  'http://localhost/baitaptrenlop/index.php?module=users&action=menu' ?> class='btn btn-success back'>Back</a>
        </div>
    </form>
</div>
<?php
require_once 'pages/head.php';
?>