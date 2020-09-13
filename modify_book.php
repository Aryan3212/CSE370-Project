<?php
    $errors = ['error'=>'','flag'=>TRUE];
    $title = '';
    $author = '';
    $genre = '';
    $quantity = '';
    $pub_id = '';
    $ISBNog = $_POST['modify_id'];
    $ISBNnew = '';
    $price = '';
    include 'DBconn.php';
    
    if(isset($_POST['submit'])):
        if(!empty($_POST['title'])):
            $title = $_POST['title'];
            $sql = "UPDATE book SET title ='$title' WHERE ISBN = '$ISBNog'";
            mysqli_query($conn,$sql);
        endif;
        if(!empty($_POST['author'])):
            $author = $_POST['author'];
            $sql = "UPDATE book SET author ='$author' WHERE ISBN = '$ISBNog'";
            mysqli_query($conn,$sql);
        endif;
        if(!empty($_POST['genre'])):
            $genre = $_POST['genre'];
            $sql = "UPDATE book SET genre ='$title' WHERE ISBN = '$ISBNog'";
            mysqli_query($conn,$sql);
        endif;
        if(!empty($_POST['quantity'])):
            $quantity = $_POST['quantity'];
            $sql = "UPDATE book SET quantity ='$quantity' WHERE ISBN = '$ISBNog'";
            mysqli_query($conn,$sql);
        endif;
        if(!empty($_POST['pub_id'])):
            $pub_id = $_POST['pub_id'];
            $sql = "UPDATE book SET pub_id ='$pub_id' WHERE ISBN = '$ISBNog'";
            mysqli_query($conn,$sql);
        endif;
        if(!empty($_POST['ISBNnew'])):
            $ISBNnew = $_POST['ISBNnew'];
            $sql = "UPDATE book SET ISBN ='$ISBNnew' WHERE ISBN = '$ISBNog'";
            $ISBNog = $ISBNnew;
            mysqli_query($conn,$sql);
        endif;
        if(!empty($_POST['price'])):
            $title = $_POST['price'];
            $sql = "UPDATE book SET price ='$price' WHERE ISBN = '$ISBNog'";
            mysqli_query($conn,$sql);
        endif;
        $title = '';
        $author = '';
        $genre = '';
        $quantity = '';
        $pub_id = '';
        $ISBNog = '';
        $price = '';
        header("Location: bookdash.php");
    endif;

    if($errors['flag']==TRUE){

    }else{
        $title = '';
        $author = '';
        $genre = '';
        $quantity = '';
        $pub_id = '';
        $ISBNog = '';
        $price = '';
        header("Location: add_books.php");
    }
    $sql = "SELECT title,ISBN from book WHERE ISBN = '$ISBNog'";
    $result = mysqli_query($conn,$sql);
    $book = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
    
    <?php require 'header.php'; ?>
    <h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">BOOKS DASHBOARD</h2>
   <section class="container black-text teal-lighten-5">
    <form class="teal-lighten-3" action="modify_book.php" method="POST">
    <h3 class="white-text">MODIFY BOOK</h3>    
    <p>FIll in the attributes you want to modify, leave blank if you want to keep it unchanged</p>
    <p>You are modifying <?php echo $book['title']." ISBN: ".$book['ISBN']?></p>
        <label class="white-text" style="font-size: 20px">Book Title</label><input type="text" name="title" value="<?php echo $title;?>">
        <label class="white-text" style="font-size: 20px">Author</label><input type="text" name="author" value="<?php echo $author;?>">
        <label class="white-text" style="font-size: 20px">Genre</label><input type="text" name="genre" value="<?php echo $genre;?>">
        <label class="white-text" style="font-size: 20px">ISBN</label><input type="text" name="ISBNnew" value="<?php echo $ISBNnew;?>">
        <label class="white-text" style="font-size: 20px">Price</label><input type="text" name="price" value="<?php echo $price;?>">
        <label class="white-text" style="font-size: 20px">Quantity</label><input type="text" name="quantity" value="<?php echo $quantity;?>">
        <label class="white-text" style="font-size: 20px">Publishers ID(must exist in our database): </label><input type="text" name="pub_id" value="<?php echo $pub_id;?>">
        <input type="hidden" name="modify_id" value="<?php echo $ISBNog;?>" class="btn brand z-depth-0">
        <div class="center"><input type="submit" name="submit" value="submit" class="btn brand z-depth-0"></div>
        <div class="red-text"><?php echo $errors['error'];?></div>
    </form>
    </section>
    <?php require 'footer.php';
    ?>

        
   
</html>