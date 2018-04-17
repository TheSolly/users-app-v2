<?php 
require_once 'config/config.php';

if (isset($_GET['delete'])) {
  if (isset($_GET['delete']) == null) {
    header("location:404.php");
    exit();
  }
  else {
    $id = $_GET['delete'];
    deleteUserbyId($id);
    exit(header("location:index.php"));
  }
}

$userList = getAllUsers();

_header(APP_NAME);
 ?>
    <div class="row">
      <div class="col-12">
        <a href="adduser.php" class="h4 page-link bg-primary text-white text-center text-uppercase font-weight-bold">Add New student</a>
        <table class="table table-bordered text-lg-center mt-2">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">First Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach($userList as $user) : 
              ?>
                <tr>
                  <td><?php echo $user['id']; ?></td>
                  <td><?php echo $user['username']; ?></td>
                  <td><?php echo $user['full_name']; ?></td>
                  <td><a href="updateuser.php?user_id=<?php echo $user['id'];?>" class="btn btn-secondary">Edit</a></td>
                  <td><a href="index.php?delete=<?php echo $user['id'];?>" class="btn btn-danger">Delete</a></td>
                </tr>
              <?php 
              endforeach; 
              ?>
            </tbody>
          </table>
      </div>  
    </div>
<?php 
_footer();
 ?>