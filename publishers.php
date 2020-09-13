<?php
require 'DBconn.php';
$delete_message = '';
if (isset($_POST['delete'])) :
    $id_to_delete = $_POST['id_to_delete'];
    $sql = "DELETE FROM publisher WHERE pub_id='$id_to_delete'";

    if (mysqli_query($conn, $sql)) :
        $delete_message = 'Publisher ID: ' . $id_to_delete . ' was deleted from the database';
    else :
        $delete_message = 'Something went wrong while deleting!';
    endif;
endif;
$sql = 'SELECT * FROM publisher';

$result = mysqli_query($conn, $sql);

$publishers = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);



// print_r($publishers);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<?php require 'header.php'; ?>
<nav class="white z-depth-0">
    <div class="container">

        <ul id="nav-mobile" class="class right hide-on-small-and-down">
            <li><a href="add_publishers.php" class="btn brand z-depth-0">ADD PUBLISHERS</a></li>
        </ul>
    </div>
</nav>
<h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">PUBLISHERS LIST</h2>
<div class="container">
    <div class="row">
        <?php foreach ($publishers as $publisher) : ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6 class="center">Publishers ID: <?php echo $publisher['pub_id']; ?></h6>
                        <p class="center">Name: <?php echo $publisher['name']; ?></p>
                        <p class="center">Address: <?php echo $publisher['address']; ?></p>
                        <p class="center">Email: <?php echo $publisher['email']; ?></p>

                        <form style="display: inline;" action="modify_publisher.php" method="POST">
                            <input type="hidden" name="modify_id" value="<?php echo $publisher['pub_id']; ?>" class="btn brand z-depth-0">
                            <input type="submit" name="modify" value="Modify" class="btn brand z-depth-0">
                        </form>
                        <form style="display: inline;" action="publishers.php" method="POST">
                            <input type="hidden" name="id_to_delete" value="<?php echo $publisher['pub_id']; ?>" class="btn brand z-depth-0">
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