<?php
require_once 'pages/head.php';
?>
<h3>List users</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th width="5%">Edit</th>
            <th width="5%">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $allListUser = getRaw("SELECT * FROM users");
     
        if (!empty($allListUser)):
            $count = 0;
            foreach ($allListUser as $item):
                $count++;
        ?>
                <tr>
                    <th scope="row"><?php echo $count; ?></th>
                    <td><?php echo $item['username']; ?></td>
                    <td><?php echo $item['phone']; ?></td>
                    <td><?php echo $item['email']; ?></td>
                    <td><?php echo $item['role']; ?></td>
                    <td><a href="http://localhost/baitaptrenlop/index.php?module=users&action=edit&id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                    <td><a href="http://localhost/baitaptrenlop/index.php?module=users&action=delete&id=<?php echo $item['id']; ?>"   onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a></td>
                    
                </tr>
            <?php
            endforeach;
        else:
            ?>
            <tr>
                <td colspan="6">Không có người dùng nào.</td>
            </tr>
        <?php
        endif;
        ?>



    </tbody>
</table>
<?php
require_once 'pages/footer.php';
?>