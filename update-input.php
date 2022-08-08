<?php
$pdo = new PDO(
    "mysql:host=localhost;dbname=shop;charset=utf8",
    "staff",
    "password"
);
foreach ($pdo->query("select * from product") as $row) {
    echo '<form action="update-output.php" method="post">';
    echo '<input type="hidden" name="id" value="', $row["id"], '">';
    echo "$row[id]";
    echo '<input type="text" name="name" value="' . $row["name"] . '">';
    echo '<input type="text" name="price" value="' . $row["price"] . '">';
    echo '<input type="submit" value="更新">';
    echo "</form>";
}

?>
