<?php
    $errors = ['error'=>'','flag'=>TRUE];
    
    $name = ''; 
    $email = ''; 
    $phone = ''; 
    $username = '';
    $pass1 = '';
    $role = '';
    if(isset($_POST['submit'])):
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['username']) || empty($_POST['pass'])):
            $errors['error'] ='Incomplete Form <br/>';
            $errors['flag'] = TRUE;
        else:
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $username = $_POST['username'];
            $pass1 = $_POST['pass'];
            $role = "staff";
            include 'DBconn.php';
            $sql = "INSERT INTO auth (pass, username, role) VALUES ('$pass1','$username','$role')";
            mysqli_query($conn, $sql);
            $sql = "INSERT INTO staff (name, email, phone, username) VALUES ('$name', '$email', '$phone', '$username')";
            
            if(mysqli_query($conn, $sql)){
                $errors['error'] = 'Successfully Added!';
            }else{
                $errors['error'] = 'Something went wrong while adding a staff!';
            }
        endif;
    endif;

    if($errors['flag']==TRUE){

    }else{
        $name = ''; 
        $email = ''; 
        $phone = ''; 
        $username = '';
        $pass = '';
        $role = '';
        header("Location: add_staff.php");
    }


?>
<!DOCTYPE html>
<html>
    
    <?php require 'header.php'; ?>
    <h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">STAFF DASHBOARD</h2>
   <section class="container black-text teal-lighten-5">
    <form class="teal-lighten-3" action="add_staff.php" method="POST">
    <h3 action="" method="" class="white-text">ADD A STAFF</h3>    
        <label class="white-text" style="font-size: 20px">Staff Name</label><input type="text" name="name" value="<?php echo $name;?>">
        <label class="white-text" style="font-size: 20px">Email</label><input type="text" name="email" value="<?php echo $email;?>">
        <label class="white-text" style="font-size: 20px">Phone</label><input type="text" name="phone" value="<?php echo $phone;?>">
        <label class="white-text" style="font-size: 20px">Username(must be unique)</label><input type="text" name="username" value="<?php echo $username;?>">
        <label class="white-text" style="font-size: 20px">Password</label><input type="text" name="pass" value="">
        <div class="center"><input type="submit" name="submit" value="submit" class="btn brand z-depth-0"></div>
        <div class="red-text"><?php echo $errors['error'];?></div>
    </form>
    </section>
    <?php require 'footer.php';
    ?>

        
   
</html>