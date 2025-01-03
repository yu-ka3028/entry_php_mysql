<?php
require '/var/www/config.php';  //dockerでphp実行してるので/var/www

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
  $pdo = new PDO($dsn, $user, $password);
  $sql = "SELECT * FROM books WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => 3]);
  $reading_lists = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
	echo $e->getMessage();
}

// if ($reading_lists) {
//   echo json_encode($reading_lists); // JSON形式で表示
// } else {
//   echo "データが見つかりませんでした。"; // データがない場合のメッセージ
// }
// echo $reading_lists;
// echo ($dsn);
// echo ($reading_list);
?>

<a href="index.php">TOPページ</a>

<h1>書籍一覧</h1>

<?php if ($reading_lists): ?>
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
        <tr>
            <td><?php echo htmlspecialchars($reading_lists['isbn'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($reading_lists['title'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($reading_lists['author'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($reading_lists['genre'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($reading_lists['price'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><img src="<?php echo htmlspecialchars($reading_lists['image_url'], ENT_QUOTES, 'UTF-8'); ?>" alt="book image"></td>
            <td><?php echo htmlspecialchars($reading_lists['detail'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
    </table>
<?php else: ?>
    <p>データが見つかりませんでした。</p>
<?php endif; ?>