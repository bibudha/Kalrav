<?php 
 /*?>$d=date('M Y');
$a=explode(" ",$d);
echo $a[0];
echo"\n";?>
<br>
<?php 
echo $a[1];
$f=substr($a[1],2,2);
echo $f;

$comp="k";
$id=1;
$pro="p";
if($a[0]=="jan")
{
$id=0;

} ?><br>
<?php
$cat=$comp.$f.$pro;
echo uniqid($cat);

<?php */
$asw="";

$asw=$str; 
//echo $asw;
echo"\n";
$sub = explode("," ,$str);
//print_r($sub);
$sum=0;
foreach($sub as $key)
	{
		//echo $key;
		$new_val = explode("*",$key);
		echo $new_val[0];
		echo "<br/>";
		echo $new_val[1];	
			
		echo "<br/>";
		$sum +=($new_val[0])*($new_val[1]);
	}

echo"<br/>";
echo $sum;
//echo $asw; */

?>
