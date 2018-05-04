<?php 
require_once "../../config/config.php";

if (isset($_POST['del'])) {
    $id = $_POST['del'];
    User::delete($id);

}

if (isset($_POST["getAll"])) {
    foreach (User::find(ADMINS,$attr = "type") as $user) :
    ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['full_name']; ?></td>
        <td id="<?php echo $user['username']; ?>" class="user-name"><?php echo $user['username']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><a id="<?php echo $user['id']; ?>" class="btn btn-secondary edit">Edit</a></td>
        <td><a id="<?php echo $user['id']; ?>" class="btn btn-danger del">Delete</a></td>
    </tr>
    <?php 
    endforeach;

}

if (isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $user = User::find($id);
      ?>
    <form action="" method="post" id="form-update" name="form-update">
      <div class="form-text bg-success text-white text-center font-weight-bold rounded">Update User</div>
      <div class="form-group">
        <input type="hidden" name="id" class="form-control" value="<?php echo $user['id'] ?>">
      </div>
      <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="full_name" class="form-control" value="<?php echo $user['full_name'] ?>">
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $user['username'] ?>">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $user['email'] ?>">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="">
      </div>
      <div class="form-group">
        <label>Re-enter Password</label>
        <input type="password" name="re_password" class="form-control" value="">
      </div>
      <div class="form-group">
        <button name="submit" value="submit" id="user-update" class="btn btn-success btn-block font-weight-bold" type="submit">Save</button>
      </div>
    </form>
     <?php
}

if (isset($_POST['username'], $_POST['full_name'], $_POST['email'], $_POST['password'], $_POST['re_password'], $_POST['id'])) {
    $username = $_POST['username'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $type = ADMINS;
    $id = $_POST['id'];
    // Update users
    $user = new User($username, $full_name, $email, $password, $type, $id);
    $user->update();
}