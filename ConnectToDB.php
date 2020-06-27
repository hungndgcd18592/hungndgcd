<!DOCTYPE html>
<html>
<body>

<h1>DATABASE OF STORE</h1>


<?php
ini_set('display_errors', 1);
echo "Information of the product is listed below!";
?>
    <form name="SelectData" action="ConnectToDB.php" method="POST" >
    </form>
<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     echo '<p>The DB exists</p>';
     echo getenv("dbname");
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
          "host=
ec2-52-200-119-0.compute-1.amazonaws.com
;port=5432;user=bsoftcnuneszmg;password=ffbf603a129cbdd6304c87386df81eb4272cb0c072f9428830572eef6df2a663;dbname=d8ialp45a8u6p6",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

$sql = "SELECT * FROM product";
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
echo '<p>product information:</p>';

?>
<div id="container">
<table class="table table-bordered table-condensed">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>price</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // tạo vòng lặp 
         //while($r = mysql_fetch_array($result)){
             foreach ($resultSet as $row) {
      ?>
   
      <tr>
        <td scope="row"><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['price'] ?></td>
        
      </tr>
     
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>