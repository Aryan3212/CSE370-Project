<?php
    $errors = ['error'=>'','flag'=>TRUE];
    $name = '';
    $email = '';
    $address = '';
    $pub_id = $_POST['modify_id'];
    include 'DBconn.php';
    if(isset($_POST['submit'])):
        if(!empty($_POST['name'])):
            $name = $_POST['name'];
            $sql = "UPDATE publisher SET name ='$name' WHERE pub_id = '$pub_id'";
            mysqli_query($conn,$sql);
        endif;
        if(!empty($_POST['email'])):
            $email = $_POST['email'];
            $sql = "UPDATE publisher SET email ='$email' WHERE pub_id = '$pub_id'";
            mysqli_query($conn,$sql);
          
        endif;
        if(!empty($_POST['address'])):
            $address = $_POST['address'];
            $sql = "UPDATE publisher SET address ='$address' WHERE pub_id = '$pub_id'";
            mysqli_query($conn,$sql);
          
        endif;
        $name = '';
        $email = '';
        $address = '';
        header("Location: publishers.php");
    endif;

    if($errors['flag']==TRUE){

    }else{
        $name = '';
        $email = '';
        $address = '';
        header("Location: publishers.php");
    }
    $sql = "SELECT name, pub_id from publisher WHERE pub_id = '$pub_id'";
    $result = mysqli_query($conn,$sql);
    $publisher = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
    
    <?php require 'header.php'; ?>
    <h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">STUDENT DASHBOARD</h2>
   <section class="container black-text teal-lighten-5">
    <form class="teal-lighten-3" action="modify_publisher.php" method="POST">
    <h3 class="white-text center">MODIFY PUBLISHER DETAILS</h3>    
    <p>FIll in the attributes you want to modify, leave blank if you want to keep it unchanged</p>
    <p>You are modifying <?php echo $publisher['name']." pub_id: ".$publisher['pub_id']?></p>
        <label class="white-text" style="font-size: 20px">Name</label><input type="text" name="name" value="<?php echo $name;?>">
        <label class="white-text" style="font-size: 20px">Email</label><input type="text" name="email" value="<?php echo $email;?>">
        <label class="white-text" style="font-size: 20px">Address</label><input type="text" name="address" value="<?php echo $address;?>">
        <input type="hidden" name="modify_id" value="<?php echo $pub_id;?>" class="btn brand z-depth-0">
        <div class="center"><input type="submit" name="submit" value="submit" class="btn brand z-depth-0"></div>
        <div class="red-text"><?php echo $errors['error'];?></div>
    </form>
    </section>

    <?php require 'footer.php';?>

        
   
</html>