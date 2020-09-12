<?php

    require 'DBconn.php';
    
    $sql = 'SELECT * FROM book';
    
    $result = mysqli_query($conn, $sql);

    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_free_result($result);

    mysqli_close($conn);
    
   //print_r($books);

?>
<!DOCTYPE html>
<html>
    
    <?php require 'header.php'; ?>
    <h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">BOOKS DASHBOARD</h2>
    <div class="container">
        <div class="row">
        <?php foreach($books as $book): ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6 class = "center">Title: <?php echo $book['title'];?></h6>
                        <p class = "center">Author: <?php echo $book['author'];?></p>
                        <p class = "center">ISBN: <?php echo $book['ISBN'];?></p>
                        <p class = "center">Quantity Available: <?php echo $book['quantity'];?></p></br> 
                        <p class = "center">Publisher: <?php echo $book['publisher'];?></p></br> 
                        <div class="center"><input type="submit" name="submit" value="DELETE" class="btn brand z-depth-0"></div><br/>
                        <div class="center"><input type="submit" name="submit" value="MODIFY" class="btn brand z-depth-0"></div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        </div>
    </div>
    <?php require 'footer.php'; ?>