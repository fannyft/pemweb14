<?php
$link = mysql_connect("localhost","root");
mysql_select_db("user",$link);
$kab = $_GET['s'];
$query = mysql_query("SELECT kab.id_kab , kab.kabupaten FROM kab , prop WHERE kab.id_prop = prop.id_prop and prop.id_prop='$kab'");
$input = $_GET['s'];
if(mysql_num_rows($query)>0){
	echo "<select>";
	while($row= mysql_fetch_array($query)){
	echo "<option value='$row[0]'>$row[1]<br>";
}
echo "</select>";
}else{
echo "username $kab sudah ada yang pakai";
}
?>