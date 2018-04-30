<?php 
require_once "../../config/config.php";

if (isset($_POST['del'])) {
    $id = $_POST['del'];

    if (User::delete($id)) {
        echo "Done";
    } else {
        echo "Error!";
    }

} elseif (isset($_POST["getAll"])) {
    foreach ($userList as $user) :
    ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['full_name']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><a href="<?php ADMIN_URL; ?>?edit=<?php echo $user['id']; ?>" class="btn btn-secondary">Edit</a></td>
        <td><a href="admins.php?delete=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php 
    endforeach;

}
