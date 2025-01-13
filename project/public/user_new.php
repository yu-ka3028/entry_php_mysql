<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    try
    {
      $new_username = $_POST["username"];
      $new_email = $_POST["email"];
      $new_password = $_POST["password"];

      $new_username = htmlspecialchars($new_username, ENT_QUOTES,'UTF-8');
      $new_email = htmlspecialchars($new_email, ENT_QUOTES,'UTF-8');
      $new_password = htmlspecialchars($new_password, ENT_QUOTES,'UTF-8');

      $dsn = 'mysql:dbname=books;host=mysql;charset=utf8';  //host=(ローカル:localhost/Docker:mysql)
      $user = getenv('DB_USER');
      $password = getenv('DB_PASSWORD');
      $dbh = new PDO($dsn, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //sqlへデータを追加
      $sql = 'INSERT INTO users(username,email,password) VALUES (?,?,?)';
      $stmt = $dbh->prepare($sql);
      $data[] = $new_username;
      $data[] = $new_email;
      $data[] = $new_password;
      $stmt->execute($data);

      $dbh = null;

      echo $new_username;
      echo 'さんを追加しました。';
    }
    catch(Exception $e)
    {
      echo '障害中: ' . $e->getMessage();
      exit();
    }
  ?>
  <a href="user.php">戻る</a>
</body>
</html>