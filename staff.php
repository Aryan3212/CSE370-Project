<?php
require 'DBconn.php';
$delete_message = '';
if (isset($_POST['delete'])) :
    $id_to_delete = $_POST['id_to_delete'];
    $sql = "DELETE FROM auth WHERE username=(SELECT username FROM staff WHERE id =$id_to_delete)";
    
    if (mysqli_query($conn, $sql)) :
        //$delete_message = 'STAFF ID: ' . $id_to_delete . ' was deleted from the database';
    else :
        //$delete_message = 'Something went wrong while deleting!';
    endif;
    $sql = "DELETE FROM staff WHERE id='$id_to_delete'";

    if (mysqli_query($conn, $sql)) :
        $delete_message = 'STAFF ID: ' . $id_to_delete . ' was deleted from the database';
    else :
        $delete_message = 'Something went wrong while deleting!';
    endif;
    
endif;
$sql = 'SELECT * FROM staff';

$result = mysqli_query($conn, $sql);

$staffs = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);



// print_r($staffs);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<?php require 'header.php'; ?>
<nav class="white z-depth-0">
    <div class="container">

        <ul id="nav-mobile" class="class right hide-on-small-and-down">
            <li><a href="add_staff.php" class="btn brand z-depth-0">ADD STAFF</a></li>
        </ul>
    </div>
</nav>
<h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">STAFF LIST</h2>
<div class="container">
    <div class="row">
        <?php foreach ($staffs as $staff) : ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6 class="center">Staff ID: <?php echo $staff['id']; ?></h6>
                        <p class="center">Name: <?php echo $staff['name']; ?></p>
                        <p class="center">Phone: <?php echo $staff['phone']; ?></p>
                        <p class="center">Email: <?php echo $staff['email']; ?></p>
                        <p class="center">Username: <?php echo $staff['username']; ?></p>

                        <form style="display: inline;" action="modify_staff.php" method="POST">
                            <input type="hidden" name="modify_id" value="<?php echo $staff['id']; ?>" class="btn brand z-depth-0">
                            <input type="submit" name="modify" value="Modify" class="btn brand z-depth-0">
                        </form>
                        <form style="display: inline;" action="staff.php" method="POST">
                            <input type="hidden" name="id_to_delete" value="<?php echo $staff['id']; ?>" class="btn brand z-depth-0">
                            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <p class="center">
            <!--<?php //echo $delete_message; $delete_message=''; 
                ?></p>-->
    </div>
</div>
<?php require 'footer.php'; ?>

</html>