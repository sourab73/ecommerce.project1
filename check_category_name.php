<?php


include("dbConnection/connect.php");
include("method.php");
$db = new connection();
//echo $db->sms;
$mod=new phpMethod();

$sql="select * from category_information  where ItemName='".$_REQUEST['item']."'";

//this "item" is a varriable of pdt page

$query=$mod->excuteView($sql);
print "<option>"."....Select One....."."</option>";
while($fetch=$query->fetch_array())
{
	print "<option>".$fetch[2]."</option>";
}	

?>