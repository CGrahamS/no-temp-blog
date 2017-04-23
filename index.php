<?php 

/*     require_once("./Constants.php");

     $constants = new Constants();

     $host = $constants::HOST;
     $username = $constants::USER_NAME;
     $password = $constants::PASSWORD;
     $dbname = $constants::DB_NAME;
     $charset = $constants::CHARSET;*/

     $current_page = 'home';

/*     try {

          $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
          $opt = [
               PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
               PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
               PDO::ATTR_EMULATE_PREPARES   => false,
          ];

          $pdo = new PDO($dsn, $username, $password, $opt);
          $stmt = $pdo->query('SELECT * FROM posts');

          $pdo = null;

     }
     catch(PDOException $e) {
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
     }*/

?>

 <!DOCTYPE html>
 <html>
     <head>
          <?php include 'head.php'; ?>
     	<title>Home</title>
     </head>
     <body>
     	<div class='container-fluid'>
               <?php include 'nav.php'; ?>
     		<div class="jumbotron header">
     			<h2>Welcome Home!</h2>
     		</div>
     		<div class='col-md-8 col-md-offset-2'>
                    <?php 
                         if ($stmt->rowCount() > 0) {
                              foreach ($stmt as $row) {
                                   echo "
                                   <div class='well'>
                                        <h3> " . $row['title'] . "</h3>
                                        <p> " . nl2br($row['body']) . "</p>
                                   </div>
                                   ";
                              } 
                         } else {
                              echo "<h1 class='header'>No posts! :(</h1>";
                         }
                     ?>
     		</div>
     	</div>
     </body>
 </html>