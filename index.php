<?php
try{
    $dbconn = new PDO("pgsql:host=127.0.0.1;port=5434;dbname=goryakin", "postgres", "root");
}catch (PDOException $e){
    echo $e->getMessage();
}
require_once 'vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
$excel = PHPExcel_IOFactory::load('ex.xlsx');

foreach ($excel->getWorksheetIterator() as $worksheet){
    $lists[] = $worksheet->toArray();
}
/*$res = $dbconn->prepare('select * from store.categories');
$res->execute();
$row = $res->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
var_dump($row);*/

foreach ($lists as $list){
    //считываем все строки
    foreach ($lists as $row)
        //print_r($row[15]);
       for($i = 530; $i < 549; $i++){
           $dbconn->exec("INSERT INTO store.prod(name,price,id_category,quantity) VALUES ('".$row[$i][1]."' , '".$row[$i][2]."',38,'".$row[$i][3]."');");
        }
}