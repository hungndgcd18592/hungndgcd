<!DOCTYPE html>
<html>
<head>
	<title>Insert product</title>
	<link rel="stylesheet" type="text/css" href="css/insert.css">
<body>
    <form class="box" action="InsertData.php" method="post">
		<h1>Insert Product</h1>
		<input class="signup" type="text" name="id" placeholder="Product ID">
		<input class="signup" type="text" name="name" placeholder="Product Name">
		<input class="signup" type="text" name="price" placeholder="Price">
		<input class="signup" type="submit" name="" value="Submit">
	        <div class= "home">    <a href="index.php" >Home</a> </div>
	
    </div>
	</form> 
	

</body>
</html>


<?php

if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
             "host=
ec2-34-206-31-217.compute-1.amazonaws.com
;port=5432;user=nxztjfeqpqoluc;password=f1b2e9579758f75f118910d8b42c1d40b363b17fc198cfb7c150306d9e66ec61
;dbname=d4ptd51chil6sn",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

if($pdo === false){
     echo "ERROR: Could not connect Database";
}


$sql = "INSERT INTO product(id, name,price)"
        . " VALUES('$_POST[id]','$_POST[name]','$_POST[price]')";
$stmt = $pdo->prepare($sql);
//$stmt->execute();
 if (is_null($_POST[id])) {
   echo "productid must be not null";
 }
 else
 {
    if($stmt->execute() == TRUE){
        echo "Record inserted successfully.";
    } else {
        echo "Error inserting record: ";
    }
 }
?>
</body>
</html>
