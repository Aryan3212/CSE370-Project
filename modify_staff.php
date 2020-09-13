<?php
    $errors = ['error'=>'','flag'=>TRUE];
    $name = '';
    $phone = '';
    $email = '';
    $id = $_POST['modify_id'];
    include 'DBconn.php';
    if(isset($_POST['submit'])):
        if(!empty($_POST['name'])):
            $name = $_POST['name'];
            $sql = "UPDATE staff SET name ='$name' WHERE id = '$id'";
            mysqli_query($conn,$sql);
        endif;
        if(!empty($_POST['phone'])):
            $phone = $_POST['phone'];
            $sql = "UPDATE staff SET phone ='$phone' WHERE id = '$id'";
            mysqli_query($conn,$sql);
          
        endif;
        if(!empty($_POST['email'])):
            $email = $_POST['email'];
            $sql = "UPDATE staff SET email ='$email' WHERE id = '$id'";
            mysqli_query($conn,$sql);
          
        endif;
        $name = '';
        $phone = '';
        $email = '';
        header("Location: staff.php");
    endif;

    if($errors['flag']==TRUE){

    }else{
        $name = '';
        $phone = '';
        $email = '';
        header("Location: staff.php");
    }
    $sql = "SELECT name, id from staff WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    $staff = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
    
    <?php require 'header.php'; ?>
    <h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">STAFF DASHBOARD</h2>
   <section class="container black-text teal-lighten-5">
    <form class="teal-lighten-3" action="modify_staff.php" method="POST">
    <h3 class="white-text center">MODIFY STUDENT DETAILS</h3>    
    <p>FIll in the attributes you want to modify, leave blank if you want to keep it unchanged</p>
    <p>You are modifying <?php echo $staff['name']." Student ID: ".$staff['id']?></p>
        <label class="white-text" style="font-size: 20px">Name</label><input type="text" name="name" value="<?php echo $name;?>">
        <label class="white-text" style="font-size: 20px">Phone</label><input type="text" name="phone" value="<?php echo $phone;?>">
        <label class="white-text" style="font-size: 20px">Email</label><input type="text" name="email" value="<?php echo $email;?>">
        <input type="hidden" name="modify_id" value="<?php echo $id;?>" class="btn brand z-depth-0">
        <div class="center"><input type="submit" name="submit" value="submit" class="btn brand z-depth-0"></div>
        <div class="red-text"><?php echo $errors['error'];?></div>
    </form>
    </section>

    <?php require 'footer.php';?>

        
   
</html>