<?php
mysql_connect("localhost","root",""); 
mysql_select_db("user"); 

$query = mysql_query("select id_prop,prop from prop"); 
?>

<html>
<head>
<script>
var drz, kata, x;
function cekid(){
kata = document.getElementById("userid").value;
if(kata.length>2){
document.getElementById("teks").innerHTML = "checking...";
drz = buatajax();
var url="cekid.php";
url=url+"?q="+kata;
url=url+"&sid="+Math.random();
drz.onreadystatechange=stateChanged;
drz.open("GET",url,true);
drz.send(null);
}else{
fokus();
}
}
function buatajax(){
if (window.XMLHttpRequest){
return new XMLHttpRequest();
}
if (window.ActiveXObject){
return new ActiveXObject("Microsoft.XMLHTTP");
}
return null;
}
function stateChanged(){
var data;
if (drz.readyState==4){
data=drz.responseText;
document.getElementById("teks").innerHTML = data;
}
}
function fokus(){
document.getElementById("userid").focus();
}
function cekumur(){
umur = document.getElementById("umurku").value;
if(umur.length>0){
drz = buatajax();
var url="cek_num.php";
url=url+"?r="+umur;
url=url+"&sid="+Math.random();
drz.onreadystatechange=stateChanged3;
drz.open("GET",url,true);
drz.send(null);
}else{
fokus3();
}
}

function stateChanged3(){
var data;
if (drz.readyState==4){
data=drz.responseText;
document.getElementById("teks3").innerHTML = data;
}
}
function fokus3(){
document.getElementById("umurku").focus();
}

function cek_kec(){ 
    kec = document.getElementById("prop").value; 
    if(kec.length>0){ 
        document.getElementById("teks4").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="cek_prop.php"; 
        url=url+"?s="+kec; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged4; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus4(); 
         } 
} 


function stateChanged4(){
var data;
if (drz.readyState==4){
data=drz.responseText;
document.getElementById("teks4").innerHTML = data;
}
}
function fokus4(){
document.getElementById("prop").focus();
}
</script>
</head>
<body style="font-family:verdana;font-size:9pt">
<form>
	User Name : <input type=text name=userid id=userid onblur=cekid()>
	<span id=teks style="color:blue;font-size:8pt"></span> <br>
	Umur : <input type=text name=umur id=umurku onblur=cekumur()>
	<span id=teks3 style="color:blue;font-size:8pt"></span> <br>
	propinsi :
	<?php 
    if(mysql_num_rows($query)>0){
    echo "<select name='prop' id='prop' onchange=cek_kec()>";
    echo "<option value='0'>Pilih<br>";
    while($row=mysql_fetch_array($query))
    {
        echo "<option value='$row[0]'>$row[1]<br>";
    }
    echo "</select>";
    }
	?>
	<span id=teks4 style="color:blue;font-size:8pt"></span> <br>
</form>
</body>
</html>