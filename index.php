<?php 
require_once 'config/config.php';

if (isset($_GET['delete'])) {
  if (isset($_GET['delete']) == null) {
    header("location:404.php");
    exit();
  }
  else {
    $id = $_GET['delete'];
    User::delete($id);
    exit(header("location:index.php"));
  }
}

$courseList = Course::all();

_header(APP_NAME);
 ?>
    <div class="row">
      <div class="col-12">
        <a href="adduser.php" class="h4 page-link bg-primary text-white text-center text-uppercase font-weight-bold">Add New Student</a>
        <table class="table table-bordered text-lg-center mt-2">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Course Name</th>
                <th scope="col">Teacher Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach($courseList as $course) : 
              ?>
                <tr>
                  <td><?php echo $course['name']; ?></td>
                  <td><?php echo $course['teacher_name']; ?></td>
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