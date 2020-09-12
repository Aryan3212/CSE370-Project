<?php
    require 'DBconn.php';
    
    $sql = 'SELECT * FROM student';
    
    $result = mysqli_query($conn, $sql);

    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_free_result($result);

    mysqli_close($conn);
    
  // print_r($students);

?>
<!DOCTYPE html>
<html>
    <?php require 'header.php'; ?>
    <nav class="white z-depth-0">
            <div class="container">
               
                <ul id="nav-mobile" class="class right hide-on-small-and-down">
                    <li><a href="studentdash.php" class="btn brand z-depth-0">ADD STUDENTS</a></li>
                </ul>
            </div>
    </nav>
                <h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">STUDENTS LIST</h2>
    <div class="container">
        <div class="row">
        <?php foreach($students as $student): ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6 class = "center" >Student ID: <?php echo $student['id'];?></h6>
                        <p class = "center">Name: <?php echo $student['name'];?></p>
                        <p class = "center">Username: <?php echo $student['username'];?></p>
                        <p class = "center">Address: <?php echo $student['address'];?></p>
                        <p class = "center">Phone Number: <?php echo $student['phone'];?></p></br>
                        <div class="center"><input type="submit" name="submit" value="DELETE" class="btn brand z-depth-0"></div><br/>
                        <div class="center"><input type="submit" name="submit" value="MODIFY" class="btn brand z-depth-0"></div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        </div>
    </div>
    <?php require 'footer.php'; ?>
        
   
</html>