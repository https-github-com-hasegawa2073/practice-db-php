<?php

$pdo = new PDO("mysql:host=localhost;dbname=shop", "staff", "password");

if (isset($_REQUEST["command"])) {
    switch ($_REQUEST["command"]) {
        case "insert":
            if (
                empty($_REQUEST["name"]) ||
                !preg_match("/[0-9]+/", $_REQUEST["price"])
            ) {
                break;
            }
            $sql = $pdo->prepare("insert into product values(null, ?, ?)");
            $sql->execute([
                htmlspecialchars($_REQUEST["name"]),
                $_REQUEST["price"],
            ]);
            break;
        case "update":
            if (
                empty($_REQUEST["name"]) ||
                !preg_match("/[0-9]+/", $_REQUEST["price"])
            ) {
                break;
            }
            $sql = $pdo->prepare(
                "update product set name=?, price=? where id =?"
            );
            $sql->execute([
                htmlspecialchars($_REQUEST["name"]),
                $_REQUEST["price"],
                $_REQUEST["id"],
            ]);
            break;
        case "delete":
            $sql = $pdo->prepare("delete from product where id =?");
            $sql->execute([$_REQUEST["id"]]);
            break;
    }
}

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