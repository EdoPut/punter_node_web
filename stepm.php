<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border-style: none;
    text-align :center;
}
</style>
</head>
<?php
function read_offset (){
	exec("cat /var/www/html/node/offset.dat",$offset);
	$offset[0]=round($offset[0]*0.0878906,4);
	$g=intval($offset[0]);
	$p=($offset[0]-intval($offset[0]))*60;
        $p=intval($p);
	$offset[0]=$g;
	$offset[1]=$p;
	return ($offset);
}
function read_pos (){
	exec("cat /var/www/html/node/pos.dat",$ps);
	exec("cat /var/www/html/node/offset.dat",$offset);
	$offset[0]=round(($ps[0]+$offset[0])*0.0878906,4);
	$g=intval($offset[0]);
	$p=($offset[0]-intval($offset[0]))*60;
        $p=intval($p);
	$offset[0]=$g;
	$offset[1]=$p;
	return ($offset);
}
?>
<body>
<?php
	$pos=read_pos();
	$of=read_offset();
/*	echo "pos :";
	var_dump($pos);
	echo "<br>offset :";
	var_dump($of);
*/
?>
<table  align="center" border="5">
<th>
<form action="step_m.php">
        <input type="submit" value = "STEP -">
</form>
</th>
</table>
</body>
</html>
