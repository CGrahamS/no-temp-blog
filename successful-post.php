<?php 
     require_once("./Constants.php");

     $constants = new Constants();

     $host = $constants::HOST;
     $username = $constants::USER_NAME;
     $password = $constants::PASSWORD;
     $dbname = $constants::DB_NAME;
     $charset = $constants::CHARSET;

     try {

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, $username, $password, $opt);

        $title = $_GET['title'];
        $body = $_GET['body'];

        $stmt = $pdo->prepare('INSERT INTO posts (title, body) VALUES (:title, :body)');
        $stmt->execute(['title' => $title, 'body' => $body]);
        $pdo = null;
     }
     catch (PDOExcpetion $e) {
        echo "Error: " . $e->getMessage();
        die();
     }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include 'head.php'; ?>
        <title>Post Created!</title>
    </head>
    <body>
        <div class='container-fluid'>
        <?php include 'nav.php' ?>
            <div class='col-md-8 col-md-offset-2'>
                <h2>Your post with the title "<?php echo $title?>" was created!</h2>
                <h3>The body of the post is as follows: <br>
                    <?php echo $body ?>
                </h3>
            </div>
        </div>
    </body>
</html>