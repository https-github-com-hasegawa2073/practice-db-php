<table>
  <tr>
    <th>商品番号</th>
    <th>商品名</th>
    <th>価格</th>
  </tr>

  <?php
  $pdo = new PDO("mysql:host=localhost;dbname=shop", "staff", "password");
  $sql = $pdo->prepare("select * from product where name=?");
  $sql->execute([$_REQUEST["keyword"]]);
  foreach ($sql as $row) {
      echo "<tr>";
      echo "<td>", $row["id"], "</td>";
      echo "<td>", $row["name"], "</td>";
      echo "<td>", $row["price"], "</td>";
      echo "</tr>";
  }
  ?>

</table>
