<!DOCTYPE html>
<html>
<body>

<h1>INSERT DATA TO DATABASE</h1>

<?php
ini_set('display_errors', 1);
echo "Delete database!";
?>

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

$sql = "DELETE FROM product WHERE ProductID = '01'";
$stmt = $pdo->prepare($sql);
if($stmt->execute() == TRUE){
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record: ";
}

?>
</body>
</html>
