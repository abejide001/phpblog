<?php
    require('config/config.php');
    require('config/db.php');
    

    //create query
    $query="SELECT * FROM posts ORDER BY created_at DESC";
    //get result
    $result=mysqli_query($con, $query);
    //fetch data
    $posts=mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($posts);
    //free data
   

    mysqli_close($con);

?>
<?php  include('./inc/header.php'); ?>
<div class="container">
     <h1>Posts</h1>
    <?php foreach($posts as $post) : ?>
 <div class="well">
     <h1><?php echo $post['title']; ?></h1>
     <p>Created on  <?php echo $post['created_at'];  ?></p><p>By <?php echo $post['author'];?></p>
     <p><?php echo $post['body']; ?></p>
     <a  class="btn btn-primary" href="post.php?id=<?php echo $post['id'] ?>">READ MORE</a>
</div>
<?php endforeach; ?>
</div>
 
    <?php  include('./inc/footer.php'); ?>