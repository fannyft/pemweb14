<?php
error_reporting(0);
mysql_connect("localhost","root");
mysql_select_db("user");
$id = $_GET['q'];
$query = mysql_query("select userid from cek where userid='$id'");
if(mysql_num_rows($query)==0){
echo "$id belum ada yang pakai";
}else{
echo "$id sudah ada yang pakai";
}
?>