<?php
$pdo = new PDO("mysql:host=localhost;dbname=shop", "staff", "password");
$sql = $pdo->prepare("update product set name=?, price=? where id=?");

if (empty($_REQUEST["name"])) {
    echo "商品名を入力してください。";
} else {
    if (!preg_match("/[0-9]+/", $_REQUEST["price"])) {
        echo "商品価格を整数で入力してください。";
    } elseif (
        $sql->execute([
            htmlspecialchars($_REQUEST["name"]),
            $_REQUEST["price"],
            $_REQUEST["id"],
        ])
    ) {
        echo "追加に成功しました。";
    } else {
        echo "追加に失敗しました。";
    }
}

?>
