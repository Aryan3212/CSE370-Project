<?php
require 'DBconn.php';
$delete_message = '';
if (isset($_POST['delete'])) :
    $id_to_delete = $_POST['id_to_delete'];
    $sql = "DELETE FROM auth WHERE username=(SELECT username FROM student WHERE id ='$id_to_delete')";
    
    if (mysqli_query($conn, $sql)) : 
        //$delete_message = 'STAFF ID: ' . $id_to_delete . ' was deleted from the database';
    else :
        //$delete_message = 'Something went wrong while deleting!';
    endif;
    $sql = "DELETE FROM student WHERE id=$id_to_delete";

    if (mysqli_query($conn, $sql)) :
        $delete_message ='Student ID: '. $id_to_delete.' was deleted from the database';
    else :
        $delete_message = 'Something went wrong while deleting!';
    endif;
    
endif;
$sql = 'SELECT * FROM student';

$result = mysqli_query($conn, $sql);

$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);



// print_r($students);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<?php require 'header.php'; ?>
<nav class="white z-depth-0">
    <div class="container">

        <ul id="nav-mobile" class="class right hide-on-small-and-down">
            <li><a href="add_students.php" class="btn brand z-depth-0">ADD STUDENTS</a></li>
        </ul>
    </div>
</nav>
<h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">STUDENTS LIST</h2>
<div class="container">
    <div class="row">
        <?php foreach ($students as $student) : ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6 class="center">Student ID: <?php echo $student['id']; ?></h6>
                        <p class="center">Name: <?php echo $student['name']; ?></p>
                        <p class="center">Username: <?php echo $student['username']; ?></p>
                        <p class="center">Address: <?php echo $student['address']; ?></p>
                        <p class="center">Phone Number: <?php echo $student['phone']; ?></p></br>

                        <form style="display: inline;"action="modify_student.php" method="POST">
                        <input type="hidden" name="modify_id" value="<?php echo $student['id']; ?>" class="btn brand z-depth-0">
                        <input type="submit" name="modify" value="Modify" class="btn brand z-depth-0">
                        </form>
                        <form style="display: inline;" action="students.php" method="POST">
                            <input type="hidden" name="id_to_delete" value="<?php echo $student['id']; ?>" class="btn brand z-depth-0">
                            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
                        </form>
                       
                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <p class="center"><!--<?php //echo $delete_message; $delete_message=''; ?></p>-->
    </div>
</div>
<?php require 'footer.php'; ?>

</html>