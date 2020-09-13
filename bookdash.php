<?php

require 'DBconn.php';
$delete_message = '';
if (isset($_POST['delete'])) :
    $isbn_to_delete = $_POST['isbn_to_delete'];
    $sql = "DELETE FROM book WHERE book.ISBN='$isbn_to_delete'";
    echo $sql;
    if (mysqli_query($conn, $sql)) :
        $delete_message ='BOOK ISBN: '. $isbn_to_delete.' was deleted from the database';
        echo $delete_message;
    else :
        $delete_message = 'Something went wrong while deleting!';
        echo $delete_message;
    endif;
endif;
$sql = 'SELECT * FROM book b INNER JOIN publisher p on b.pub_id=p.pub_id';

$result = mysqli_query($conn, $sql);

$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

//$sql1 = 'SELECT * FROM publisher';

//$result1 = mysqli_query($conn, $sql1);

//$publisher_name = mysqli_fetch_all($result1, MYSQLI_ASSOC);


mysqli_free_result($result);
// mysqli_free_result($result1);

mysqli_close($conn);
//print_r($books);

?>
<!DOCTYPE html>
<html>

<?php require 'header.php'; ?>
<nav class="white z-depth-0">
    <div class="container">

        <ul id="nav-mobile" class="class right hide-on-small-and-down">
            <li><a href="add_books.php" class="btn brand z-depth-0">ADD BOOKS</a></li>
        </ul>
    </div>
</nav>
<h2 class="center-align teal-darken-3" style="font-family: Dancing-Script !important;">BOOKS DASHBOARD</h2>
<div class="container">
    <div class="row">
        <?php foreach ($books as $book) : ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6 class="center">Title: <?php echo $book['title']; ?></h6>
                        <p class="center">Author: <?php echo $book['author']; ?></p>
                        <p class="center">ISBN: <?php echo $book['ISBN']; ?></p>
                        <p class="center">Quantity Available: <?php echo $book['quantity']; ?></p></br>
                        <p class="center">Publisher: <?php echo $book['name']; ?></p></br>
                        <!--<p class = "center">Publisher: <?php echo $book['name']; ?></p></br> -->
                        <form style="display: inline;"action="modify_book.php" method="POST">
                        <input type="hidden" name="modify_id" value="<?php echo $book['ISBN']; ?>" class="btn brand z-depth-0">
                        <input type="submit" name="modify" value="Modify" class="btn brand z-depth-0">
                        </form>
                        <form style="display: inline;" action="bookdash.php" method="POST">
                            <input type="hidden" name="isbn_to_delete" value="<?php echo $book['ISBN']; ?>" class="btn brand z-depth-0">
                            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require 'footer.php'; ?>