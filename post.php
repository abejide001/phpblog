<?php
      require('config/config.php');
    require('config/db.php');
  
    if(isset($_POST['delete'])){
      $delete_id=mysqli_real_escape_string($con, $_POST['delete_id']);
    $query="DELETE FROM posts WHERE id= {$delete_id}";
   
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
    //var_dump($posts);
    //free data
   

    mysqli_close($con);

?>
<?php  include('./inc/header.php'); ?>
<div class="container">
        <a href="<?php echo ROOT_URL; ?>" class="btn btn-default">BACK</a>
     <h1><?php echo $post['title']; ?></h1>
     <p>Created on  <?php echo $post['created_at'];  ?></p><p>By <?php echo $post['author'];?></p>
     <p><?php echo $post['body']; ?></p>
        <hr>
        <form class="pull-right" method="post" action="post.php">
        <input type="hidden" name="delete_id" value="<?php echo $post['id'];?>">
        <input type="submit" name="delete" value="delete" class="btn btn-danger">
        </form>
        <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Edit</a>
</div>
<?php  include('./inc/footer.php'); ?>