<table>
    <tr>
        <th>商品番号</th>
        <th>商品名</th>
        <th>価格</th>
    </tr>
    <?php
    $pdo = new PDO(
        "mysql:host=localhost;dbname=shop;charset=utf8",
        "staff",
        "password"
    );
    foreach ($pdo->query("select * from product") as $row) {
        // echo "<p>$row[id]:$row[name]:$row[price]</p>";
        echo "<tr>";
        echo "<td>", htmlspecialchars($row["id"]), "</td>";
        echo "<td>", htmlspecialchars($row["name"]), "</td>";
        echo "<td>", htmlspecialchars($row["price"]), "</td>";
        echo "<td>";
        echo '<a href="delete-output.php?id=', $row["id"], '">削除</a>';
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>