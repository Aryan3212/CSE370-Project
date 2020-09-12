<?php
    $errors = ['error'=>'','flag'=>TRUE];
    
    $title = '';
    $author = '';
    $genre = '';
    $quantity = '';
    $pub_id = '';
    $ISBN = '';
    $price = '';
    if(isset($_POST['submit'])):
        if(empty($_POST['title']) || empty($_POST['author']) || empty($_POST['genre']) || empty($_POST['quantity']) || empty($_POST['pub_id'])|| empty($_POST['ISBN']) || empty($_POST['price'])):
            $errors['error'] ='Incomplete Form <br/>';
            $errors['flag'] = TRUE;
        else:
            $title = $_POST['title'];
          $author = $_POST['author'];
          $genre = $_POST['genre'];
          $quantity = $_POST['quantity'];
          $pub_id = $_POST['pub_id'];
          $ISBN = $_POST['ISBN'];
          $price = $_POST['price'];
            include 'DBconn.php';
            
            $sql = "INSERT INTO `book` (`ISBN`, `title`, `author`, `genre`, `price`, `shelf`, `quantity`, `pub_id`) VALUES ('$ISBN', '$title', '$author', '$genre', '$price', 'A1', '$quantity', '$pub_id')";
            
            if(mysqli_query($conn, $sql)){
                $errors['error'] = 'Successfully Added!';
            }else{
                $errors['error'] = 'Something went wrong while adding a student!';
            }
        endif;
    endif;

    if($errors['flag']==TRUE){

    }else{
        $title = '';
        $author = '';
        $genre = '';
        $quantity = '';
        $pub_id = '';
        $ISBN = '';
        $price = '';
        header("Location: add_books.php");
    }


?>
<!DOCTYPE html>
<html>
    
    <?php require 'header.php'; ?>
    <h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">BOOKS DASHBOARD</h2>
   <section class="container black-text teal-lighten-5">
    <form class="teal-lighten-3" action="add_books.php" method="POST">
    <h3 class="white-text">ADD A BOOK</h3>    
        <label class="white-text" style="font-size: 20px">Book Title</label><input type="text" name="title" value="<?php echo $title;?>">
        <label class="white-text" style="font-size: 20px">Author</label><input type="text" name="author" value="<?php echo $author;?>">
        <label class="white-text" style="font-size: 20px">Genre</label><input type="text" name="genre" value="<?php echo $genre;?>">
        <label class="white-text" style="font-size: 20px">ISBN</label><input type="text" name="ISBN" value="<?php echo $ISBN;?>">
        <label class="white-text" style="font-size: 20px">Price</label><input type="text" name="price" value="<?php echo $price;?>">
        <label class="white-text" style="font-size: 20px">Quantity</label><input type="text" name="quantity" value="<?php echo $quantity;?>">
        <label class="white-text" style="font-size: 20px">Publishers ID(must exist in our database): </label><input type="text" name="pub_id" value="<?php echo $pub_id;?>">
        <div class="center"><input type="submit" name="submit" value="submit" class="btn brand z-depth-0"></div>
        <div class="red-text"><?php echo $errors['error'];?></div>
    </form>
    </section>
    <?php require 'footer.php';
    ?>

        
   
</html>