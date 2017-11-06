<?php
    require('config/config.php');
    require('config/db.php');
    
    if(isset($_POST['submit'])){
        $update_id=mysqli_real_escape_string($con, $_POST['update_id']);


        $title=mysqli_real_escape_string($con, $_POST['title']);

        $author=mysqli_real_escape_string($con, $_POST['author']);
        
        $body=mysqli_real_escape_string($con, $_POST['body']);
        $query="UPDATE posts SET 
        title='$title',
        author='$author',
        body='$body'
    WHERE id={$update_id}";
        if(mysqli_query($con, $query)){
            header('Location: '.ROOT_URL.'');
        }
        else{
            echo 'error'.mysqli_error($con);
        }
    }
     //get id;
     $id=mysqli_real_escape_string($con, $_GET['id']);
     //create query
     $query="SELECT * FROM posts WHERE id=".$id;
     //get result
     $result=mysqli_query($con, $query);
     //fetch data
     $post=mysqli_fetch_assoc($result);
     
    
 
     mysqli_close($con);
 
?>
<?php  include('./inc/header.php'); ?>
<div class="container">
     <h1> Add Post</h1>
     <form method="post" action='editpost.php'>
        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>">
        </div>
        <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control" value="<?php echo $post['author']; ?>">
        </div>
        <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" class="form-control"><?php echo $post['body']; ?></textarea>
        </div>
        <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
        <button type="submit" class="btn btn-success" name='submit'>SUBMIT</button>
     </form>
</div>
 
    <?php  include('./inc/footer.php'); ?>