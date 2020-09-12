<?php
$errors = ['error' => '', 'flag' => TRUE];

$name = '';
$address = '';
$email = '';

if (isset($_POST['submit'])) :
    if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['email'])) :
        $errors['error'] = 'Incomplete Form <br/>';
        $errors['flag'] = TRUE;
    else :
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        include 'DBconn.php';
        $sql = "INSERT INTO publisher (address, email, name) VALUES ('$address','$email','$name')";
        if (mysqli_query($conn, $sql)) {
            $errors['error'] = 'Successfully Added!';
        } else {
            $errors['error'] = 'Something went wrong while adding a student!';
        }
    endif;
endif;

if ($errors['flag'] == TRUE) {
} else {

    $name = '';
    $address = '';
    $email = '';
    header("Location: add_publishers.php");
}


?>
<!DOCTYPE html>
<html>

<?php require 'header.php'; ?>
<h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">PUBLISHERS DASHBOARD</h2>
<section class="container black-text teal-lighten-5">
    <form class="teal-lighten-3" action="add_publishers.php" method="POST">
        <h3 action="" method="" class="white-text">ADD A PUBLISHER</h3>
        <label class="white-text" style="font-size: 20px">Name: </label><input type="text" name="name" value="" <?php echo $name; ?>">
        <label class="white-text" style="font-size: 20px">Address: </label><input type="text" name="address" value="" <?php echo $address; ?>">
        <label class="white-text" style="font-size: 20px">Email: </label><input type="text" name="email" value="" <?php echo $email; ?>">
        <div class="center"><input type="submit" name="submit" value="submit" class="btn brand z-depth-0"></div>
        <div class="red-text"><?php echo $errors['error']; ?></div>
    </form>
</section>
<?php require 'footer.php';
?>



</html>