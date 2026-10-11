<?php
include"db.php";
header("Content-type=text/csv");
header("Content-disposition:attachment;filename=product.csv");
$output=Fopen("php://output","w");
Fputcsv($output,array("bid","title","author","isbn","category","price"));
$result=$conn->query("select * from book");
while($row=$result->fetch_assoc()){
    fputcsv($output,$row);
}
?>