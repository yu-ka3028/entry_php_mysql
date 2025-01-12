<?php
require '/var/www/config.php';  //dockerでphp実行してるので/var/www

// DSNの作成
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    // 例外処理を通知する
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    // PDOで接続
    $pdo = new PDO($dsn, $user, $password, $options);
    $pdo->exec("SET NAMES 'utf8mb4'");

    $statements = [
        'CREATE TABLE IF NOT EXISTS users (
            user_id INT AUTO_INCREMENT,
            username VARCHAR(20) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(25) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY(user_id)
        );'
    ];

    foreach ($statements as $statement) {
        $pdo->exec($statement);
    }

    // usersテーブルが作成されたか確認
    $result = $pdo->query("SHOW TABLES LIKE 'users'");
    if ($result->rowCount() > 0) {
        echo "usersテーブルは作成されました。";
    } else {
        echo "usersテーブルの作成に失敗しました。";
    }

    // usersテーブルにデータを挿入
    $users = [
        ['username' => 'user1', 'email' => 'user1@example.com', 'password' => 'password1'],
        ['username' => 'user2', 'email' => 'user2@example.com', 'password' => 'password2'],
        ['username' => 'user3', 'email' => 'user3@example.com', 'password' => 'password3']
    ];

    $insertSql = 'INSERT IGNORE INTO users (username, email, password) 
                  VALUES (:username, :email, :password)';

    $stmt = $pdo->prepare($insertSql);

    foreach ($users as $user) {
        $stmt->execute([
            ':username' => $user['username'],
            ':email' => $user['email'],
            ':password' => $user['password']
        ]);
    }

    // booksを取得
    $stmt = $pdo->query("SELECT * FROM books");

} catch (PDOException $e) {
    echo "接続エラー: " . $e->getMessage();
    exit; // エラー発生時はスクリプトを終了
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        img {
            max-width: 100px;
        }
    </style>
</head>
<body>

<a href="test.php">テストページ</a>
<a href="user.php">ユーザー登録</a>

<h1>書籍一覧</h1>

<?php if ($stmt->rowCount() > 0): ?>
    <table>
        <tr>
            <th>ISBN</th>
            <th>タイトル</th>
            <th>著者</th>
            <th>ジャンル</th>
            <th>価格</th>
            <th>画像</th>
            <th>詳細</th>
        </tr>

        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['isbn'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['author'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['genre'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><img src="<?php echo htmlspecialchars($row['image_url'], ENT_QUOTES, 'UTF-8'); ?>" alt="book image"></td>
                <td><?php echo htmlspecialchars($row['detail'], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>データが見つかりませんでした。</p>
<?php endif; ?>

</body>
</html>
