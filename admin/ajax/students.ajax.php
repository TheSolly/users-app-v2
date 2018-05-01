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
    foreach (User::find(STUDENTS,$attr = "type") as $user) :
    ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td user-name="<?php echo $user['username']; ?>" class="user-name"><?php echo $user['username']; ?></td>
        <td><?php echo $user['full_name']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><a href="<?php ADMIN_URL; ?>?edit=<?php echo $user['id']; ?>" class="btn btn-secondary">Edit</a></td>
        <td><a user-id="<?php echo $user['id']; ?>" class="btn btn-danger del">Delete</a></td>
    </tr>
    <?php 
    endforeach;

}
