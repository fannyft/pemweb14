<?php
error_reporting(0);
mysql_connect("localhost","root");
mysql_select_db("user");
$id = $_GET['p'];
$query = mysql_query("select email from cek where email='$id'");
if(mysql_num_rows($query)==0){
echo "$id belum ada yang pakai";
}else{
echo "$id sudah ada yang pakai";
}
?>