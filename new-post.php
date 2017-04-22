<?php 

    $current_page = 'new-post';

?>

<!DOCTYPE html>
<html>
    <head>

        <!-- Tiny MCE -->
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>

        <!-- Styles -->
        <?php include 'head.php' ?>

    	<title>New Post</title>
    </head>
    <body>
    	<div class='container-fluid'>
            <?php include 'nav.php'; ?>
     		<div class="jumbotron header">
     			<h2>Make a New Post!</h2>
     		</div>
     		<div class="col-md-6 col-md-offset-3">
     			<form action="successful-post.php" id="post-form">
		     		<div class="form-group">
                        <label for="title">Title</label>
		     			<input type="text" name="title" id="title" class="form-control">
                        <label for="body">Body</label>
                        <textarea name="body" form="post-form" class="form-control" rows="6" placeholder="Body text here..."></textarea>
		     		</div>

		     		<button  type="submit" class="btn btn-success btn-block">Submit</button>
     			</form>
     		</div>
     	</div>
    </body>
</html>