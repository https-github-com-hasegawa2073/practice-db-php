<?php

$pdo = new PDO("mysql:host=localhost;dbname=shop", "staff", "password");
foreach ($pdo->query("select * from product") as $row) {
    echo '<form action="edit3.php" method="post">';
    echo '<input type="hidden" name="command" value="update">';
    echo '<input type="hidden" name="id" value="', $row["id"], '">';
    echo $row["id"];
    echo '<input type="text" name="name" value="', $row["name"], '">';
    echo '<input type="text" name="price" value="', $row["price"], '">';
    echo '<input type="submit" value="更新">';
    echo "</form>";
    echo '<form action="edit3.php" method="post">';
    echo '<input type="hidden" name="command" value="delete">';
    echo '<input type="hidden" name="id" value="', $row["id"], '">';
    echo '<input type="submit" value="削除">';
    echo "</form>";
    echo "<br>";
}
?>

<form action="edit3.php" method="POST">
  <input type="hidden" name="command" value="insert">
  <input type="text" name="name">
  <input type="text" name="price">
  <input type="submit" value="追加">
</form>