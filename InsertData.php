<!DOCTYPE html>
<html>
    <head>
<title>Insert data to PostgreSQL with php - creating a simple web application</title>
<link rel="stylesheet" type="text/css" href="css/insert.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {
list-style: none;
}
</style>
</head>
<body>
<h1>INSERT DATA TO DATABASE</h1>
<h2>Enter data into table</h2>
<ul>
    <form name="InsertData" action="InsertData.php" method="POST" >
<li>ID:</li><li><input type="text" name="id" /></li>
<li>Name:</li><li><input type="text" name="name" /></li>
<li>Price:</li><li><input type="text" name="price" /></li>
<li><input type="submit" name="form_click" value="Submit" /></li>
</form>
</ul>

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

$sql = "INSERT INTO product(id, name, price)"
        . " VALUES('$_POST[id]','$_POST[name]','$_POST[price]')";
$stmt = $pdo->prepare($sql);
//$stmt->execute();
 if (is_null($_POST[id])) {
   echo "ID must be not null";
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
