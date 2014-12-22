<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta content="text/html; charset=windows-1252" http-equiv="content-type"><title>Gestiao de Openwrt...</title>

<meta name="generator" content="HAPedit 3.1">
<style type="text/css">
html,body{margin:0;padding:0}
body{font: 76% arial,sans-serif;text-align:center}
p{margin:0 10px 10px}
a{display:block;color: #006;padding:10px}
div#header{position:relative}
padding-left:10px;background: #EEE;color: #79B30B}
div#header a{position:absolute;right:0;top:23px}
div#container{text-align:left}
div#content p{line-height:1.4}
div#navigation{background:#B9CAFF}
div#footer{background: #333;color: #FFF}
div#footer p{margin:0;padding:5px 10px}
div#footer a{display:inline;padding:0;color: #C6D5FD}
div#container{width:700px;margin:0 auto}
div#content{float:left;width:500px}
div#navigation{float:right;width:200px}
div#footer{clear:both;width:100%}
h1, h2, h3, h4, h5, h6 {color: #29708f;font-family: "Ubuntu",Arial,Helvetica,sans-serif;font-weight: bold;}
</style>
</head>
<body>
<div id="container">
<div id="header">
<table style="width: 100%;" border="0">
<tbody>
<tr>
<td><img alt="Logo Geeknet" src="Images/logo_geeknet.png"><br>
</td>
</tr>
<tr>
<td><img style="width: 700px; height: 139px;" alt="Image" src="Images/mundo_maos.gif"><br>
</td>
</tr>
</tbody>
</table>
<hr><strong><br>
</strong></div>
<div id="wrapper">
<div id="content">

<?php
if(isset($_POST['submit']))
{
include('Net/SSH2.php');
include 'Crypt/RSA.php';

$ssh = new Net_SSH2('192.168.1.2');
if (!$ssh->login('root', '1')) {
Exit('Login Failed');} else echo "<b>Conecto via SSH con 192.168.1.2 </b></br> ";
echo "<b>1-Testing comando linux #pwd </b></br>";
echo $ssh->exec('pwd')."</br></br>";
echo "<b>2-Test comando linux #ls -la</b></br>";
echo $ssh->exec('ls -la')."</br></br>";
echo "<b>3-Mudar senha:</b></br>";


$key1= $_POST['name'];
echo"A nova senha e Geeknet";


echo $ssh->exec('uci set wireless.@wifi-iface[0].key="'.$key1.'"')."</br>";
echo $ssh->exec('uci commit wireless');
echo $ssh->exec('wifi');

echo "Senha Trocada...";
} else echo"Esperando......</br>";
?>
 
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="name"><br>
<input type="submit" name="submit" value="Mudar Senha"><br>
</form>


</div>
</div>
<div id="navigation">
<p><strong>2) Navigation here.</strong> Opcioes </p>
</div>
<div id="footer">
<p>The footer.</p>
</div>
</div>
</body></html>