<?php
    $errors = ['error'=>'','flag'=>TRUE];
    $name = '';
    $phone = '';
    $address = '';
    $id = $_POST['modify_id'];
    include 'DBconn.php';
    if(isset($_POST['submit'])):
        if(!empty($_POST['name'])):
            $name = $_POST['name'];
            $sql = "UPDATE student SET name ='$name' WHERE id = '$id'";
            mysqli_query($conn,$sql);
        endif;
        if(!empty($_POST['phone'])):
            $phone = $_POST['phone'];
            $sql = "UPDATE student SET phone ='$phone' WHERE id = '$id'";
            mysqli_query($conn,$sql);
          
        endif;
        if(!empty($_POST['address'])):
            $address = $_POST['address'];
            $sql = "UPDATE student SET address ='$address' WHERE id = '$id'";
            mysqli_query($conn,$sql);
          
        endif;
        $name = '';
        $phone = '';
        $address = '';
        header("Location: students.php");
    endif;

    if($errors['flag']==TRUE){

    }else{
        $name = '';
        $phone = '';
        $address = '';
        header("Location: add_students.php");
    }
    $sql = "SELECT name, id from student WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    $student = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
    
    <?php require 'header.php'; ?>
    <h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">STUDENT DASHBOARD</h2>
   <section class="container black-text teal-lighten-5">
    <form class="teal-lighten-3" action="modify_student.php" method="POST">
    <h3 class="white-text center">MODIFY STUDENT DETAILS</h3>    
    <p>FIll in the attributes you want to modify, leave blank if you want to keep it unchanged</p>
    <p>You are modifying <?php echo $student['name']." Student ID: ".$student['id']?></p>
        <label class="white-text" style="font-size: 20px">Name</label><input type="text" name="name" value="<?php echo $name;?>">
        <label class="white-text" style="font-size: 20px">Phone</label><input type="text" name="phone" value="<?php echo $phone;?>">
        <label class="white-text" style="font-size: 20px">Address</label><input type="text" name="address" value="<?php echo $address;?>">
        <input type="hidden" name="modify_id" value="<?php echo $id;?>" class="btn brand z-depth-0">
        <div class="center"><input type="submit" name="submit" value="submit" class="btn brand z-depth-0"></div>
        <div class="red-text"><?php echo $errors['error'];?></div>
    </form>
    </section>

    <?php require 'footer.php';?>

        
   
</html>