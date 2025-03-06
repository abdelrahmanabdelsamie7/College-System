<?php
$host = 'localhost' ; 
$username ='root' ; 
$password =''; 
$dbname = 'college-system';

try{
   $connection = mysqli_Connect($host , $username , $password  , $dbname) ; 
}catch(Exception $e){
    echo $e->getMessage();
}