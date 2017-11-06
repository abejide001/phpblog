<?php
    require('config/config.php');
    require('config/db.php');
    
    if(isset($_POST['submit'])){
        $title=mysqli_real_escape_string($con, $_POST['title']);
        $author=mysqli_real_escape_string($con, $_POST['author']);
        $body=mysqli_real_escape_string($con, $_POST['body']);
        $query="INSERT INTO posts(title, author, body) VALUES('$title', '$author', '$body')";
        if(mysqli_query($con, $query)){
            header('Location: '.ROOT_URL.'');
        }
        else{
            echo 'error'.mysqli_error($con);
        }
    }
?>
<?php  include('./inc/header.php'); ?>
<div class="container">
     <h1> Add Post</h1>
     <form method="post" action='addpost.php'>
        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control">
        </div>
        <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success" name='submit'>SUBMIT</button>
     </form>
</div>
 
    <?php  include('./inc/footer.php'); ?>