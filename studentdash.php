<?php
    $errors = ['error'=>'','flag'=>TRUE];
    $name = ''; 
    $number = ''; 
    $address = ''; 
    $username = '';
    $pass1 = '';
    $role = '';
    if(isset($_POST['submit'])):
        if(empty($_POST['name']) || empty($_POST['number']) || empty($_POST['address']) || empty($_POST['username']) || empty($_POST['role'])|| empty($_POST['pass'])):
            $errors['error'] ='Incomplete Form <br/>';
            $errors['flag'] = TRUE;
        else:
            $name = $_POST['name'];
            $number = $_POST['number'];
            $address = $_POST['address'];
            $username = $_POST['username'];
            $pass1 = $_POST['pass'];
            $role = $_POST['role'];
            include 'DBconn.php';
            $sql = "INSERT INTO auth (pass, username, role) VALUES ('$pass1','$username','$role')";
            mysqli_query($conn, $sql);
            $sql = "INSERT INTO student (name, phone, address, username) VALUES ('$name', '$number', '$address', '$username')";
            
            if(mysqli_query($conn, $sql)){
                $errors['error'] = 'Successfully Added!';
            }else{
                $errors['error'] = 'Something went wrong while adding a student!';
            }
        endif;
    endif;

    if($errors['flag']==TRUE){

    }else{
        $name = ''; 
        $number = ''; 
        $address = ''; 
        $username = '';
        $pass = '';
        $role = '';
        header("Location: studentdash.php");
    }


?>
<!DOCTYPE html>
<html>
    
    <?php require 'header.php'; ?>
    <h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">STUDENT DASHBOARD</h2>
   <section class="container black-text teal-lighten-5">
    <form class="teal-lighten-3" action="studentdash.php" method="POST">
    <h3 action="" method="" class="white-text">ADD A STUDENT</h3>    
        <label class="white-text" style="font-size: 20px">Student Name</label><input type="text" name="name" value=""<?php echo $name;?>">
        <label class="white-text" style="font-size: 20px">Phone</label><input type="text" name="number" value=""<?php echo $number;?>">
        <label class="white-text" style="font-size: 20px">Address</label><input type="text" name="address" value=""<?php echo $address;?>">
        <label class="white-text" style="font-size: 20px">Username(must be unique)</label><input type="text" name="username" value=""<?php echo $username;?>">
        <label class="white-text" style="font-size: 20px">Password</label><input type="text" name="pass" value=""<?php echo $pass1;?>">
        <label class="white-text" style="font-size: 20px">Role</label><input type="text" name="role" value=""<?php echo $role;?>">
        <div class="center"><input type="submit" name="submit" value="submit" class="btn brand z-depth-0"></div>
        <div class="red-text"><?php echo $errors['error'];?></div>
    </form>
    </section>
    <?php require 'footer.php';
    ?>

        
   
</html>