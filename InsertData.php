<!DOCTYPE html>
<html>
<head>
	<title>Insert product</title>
	<link rel="stylesheet" type="text/css" href="Login.css">
<body>
    <form class="box" action="InsertData.php" method="post">
		<h1>Insert Product</h1>
		<input class="signup" type="text" name="productid" placeholder="Product id">
		<input class="signup" type="text" name="productname" placeholder="Product name">
		<input class="signup" type="text" name="price" placeholder="Price">
		<input class="signup" type="submit" name="" value="Submit">
	        <div class= "home">    <li> <a href="index.php" >Home</a></li> </div>
	
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

ec2-34-197-188-147.compute-1.amazonaws.com


;port=5432;user=ftbrqmbjzdokhz;password=5d4ba19be2d4ae184872f97936af42e95be0230e2211ea5a7de7104fa7417cca;dbname=d207o5vn0kgdns",
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


$sql = "INSERT INTO product(productid, productname,price)"
        . " VALUES('$_POST[productid]','$_POST[productname]','$_POST[price]')";
$stmt = $pdo->prepare($sql);
//$stmt->execute();
 if (is_null($_POST[productid])) {
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
