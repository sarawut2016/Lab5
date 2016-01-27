<html>
<head>
<title> Lab5 : PHP and AZURE DATABASE</title>
</head>
<body>
<?php
$host = "br-cdbr-azure-south-a.cloudapp.net";
$username = "b67c989f5b4132";
$pass = "e4b1e676";
$objConnect = mysql_connect($host,$username,$pass  );

if ($objConnect)
{
	echo "******MySQL Connected******";
}
else
{
	echo "MySQL Connect Failed : ".mysql_error();
}
mysql_select_db("lad4") or die("SQL Error: ".mysql_error());
$objQuery	= mysql_query("SELECT * FROM  new_table");

if($_POST){
	$name 	= $_POST["name"];
	$save2db= mysql_query("INSERT INTO  new_table(id,name) values('".$_POST["id"]."','".$_POST["name"]."')");
	/*if($save2db)
	{
		echo "&nbsp;";
	}
	else
	{
		echo "Failed";
		die(mysql_error());
	}*/
}

?>
<br><br>
<table width="600" border="1">
	<tr>
		<th width="91"> <div align="oenter">ID</div></th>
		<th width="98"> <div align="oenter">Name</div></th>
	</tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
<tr>
	<td><div align ="center"><?php echo $objResult["id"];?></div></td>
	<td><?php echo $objResult["name"];?></td>

    </tr>
<?php
}
?>
<tr>
	<form method="post" autocomplete="no">
	<tr><td><input type="text" name="id" ></td><td><input type="text" name="name" /> &nbsp;<input type="submit" value="SUBMIT" /></td></tr>
	</form>
	</tr>
<?php
mysql_close($objConnect);
?>
</body>
</html>