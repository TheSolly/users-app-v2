<?php 
require_once "../../config/config.php";

if (isset($_POST['del'])) {
    $id = $_POST['del'];


    if (Course::delete($id)) {
        echo "Done";
    } else {
        echo "Error!";
    }

} elseif (isset($_POST["getAll"])) {
    foreach (Course::all() as $course) :
    ?>
    <tr>
      <td><?php echo $course['id']; ?></td>
      <td course-name="<?php echo $course['name']; ?>" class="course-name"><?php echo $course['name']; ?></td>
      <td><?php echo $course['teacher_name']; ?></td>
      <td><a href="courses.php?edit=<?php echo $course['id']; ?>" class="btn btn-secondary">Edit</a></td>
      <td><a href="courses.php?delete=<?php echo $course['id']; ?>" class="btn btn-danger del">Delete</a></td>
    </tr>
    <?php 
    endforeach;

}
