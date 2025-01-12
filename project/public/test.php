<?php
require '/var/www/config.php';  //dockerでphp実行してるので/var/www

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
  $pdo = new PDO($dsn, $user, $password);
  $sql = "SELECT * FROM books";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $reading_lists = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
	echo $e->getMessage();
}

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
        <td><?php echo htmlspecialchars($reading_lists[0]['isbn'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($reading_lists[0]['title'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($reading_lists[0]['author'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($reading_lists[0]['genre'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($reading_lists[0]['price'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><img src="<?php echo htmlspecialchars($reading_lists[0]['image_url'], ENT_QUOTES, 'UTF-8'); ?>" alt="book image"></td>
            <td><?php echo htmlspecialchars($reading_lists[0]['detail'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
    </table>
<?php else: ?>
    <p>データが見つかりませんでした。</p>
<?php endif; ?>

<?php
$data = [
    '1' => 'One',
    2 => 'Two'
];

echo $data['1']; // One
echo $data[2];   // Two

echo $data[1]; // One
echo $data['2'];   // Two


?>