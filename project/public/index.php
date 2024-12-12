<?php
require '/var/www/config.php';

// DSNの作成
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4"; // 明示的にUTF-8mb4を指定

try {
    // PDOで接続
    $pdo = new PDO($dsn, $user, $password);
    
    // 接続後に文字セットをutf8mb4に設定
    $pdo->exec("SET NAMES 'utf8mb4'");
    
    echo "Connected to the $db database successfully!<br>";

    // SQLクエリでデータを取得
    $sql = "SELECT * FROM books";
    $stmt = $pdo->query($sql);

    // データの表示
    echo "<h1>Book List</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ISBN</th><th>Title</th><th>Author</th><th>Genre</th><th>Price</th><th>Image</th><th>Detail</th></tr>";

    // 各書籍を表示
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['isbn'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['author'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['genre'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td><img src='" . htmlspecialchars($row['image_url'], ENT_QUOTES, 'UTF-8') . "' alt='book image' width='100'></td>";
        echo "<td>" . htmlspecialchars($row['detail'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
