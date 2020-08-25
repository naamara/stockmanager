<?php
session_start();
//Connect to mysql server and selecting db
require '../conn2.php';
	

$a = $_POST['invoice'];
$b = $_POST['product'];
$c = $_POST['qty'];
$w = $_POST['pt'];
$date = $_POST['date'];
$discount = $_POST['discount'];
$customer_name = $_POST['customer_name'];

$sql2 = "select * from products where product_code='$b'";
$query = mysql_query($sql2) or die(mysql_error());
$fetch = mysql_fetch_array($query) or die(mysql_error());

$qty = $fetch['qty'];


echo "\n";
echo $a;

echo "\n";
echo $b;

echo "\n";
echo $c;

echo "\n";
echo $w;

echo "\n";
echo $date;

echo "\n";
echo $discount;





$query = mysql_query("SELECT * FROM products WHERE product_id= '$b'") or die(mysql_error());
while($row=mysql_fetch_assoc($query)){

$asasa=$row['price'];
$code=$row['product_code'];
$gen=$row['gen_name'];
$name=$row['product_name'];
$p=$row['profit'];
}

//edit qty
$sql = "UPDATE products 
        SET qty='$c'
		WHERE product_id='$b'";
$query2 = mysql_query($sql) or die(mysql_error());

$fffffff=$asasa-$discount;
$d=$fffffff*$c;
$profit=$p*$c;

echo "\n";
echo $fffffff;


echo "\n";
echo $d;


echo "\n";
echo $code;

echo "\n";
echo $p;

echo "\n";
echo $name;


echo "\n";
echo $gen;




echo "\n";
echo $profit;


// query
$sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,profit,product_code,gen_name,date,discount,customer_name) VALUES ('$a','$b','$c','$d','$name','$asasa','$p', '$code','$gen','$date',0.0, '$customer_name')";
$q = mysql_query($sql) or die(mysql_error());



header("location: sales.php?id=$w&invoice=$a&profit=$p&qty=$c");


?>