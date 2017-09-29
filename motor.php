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
?>
<table  align="center" border="5">
<th>
<form action="motor_php.php">
	Gradi:&nbsp&nbsp&nbsp<input id="g_mov" type="number" min="<?php echo $of[0]; ?>" max="<?php echo $of[0]+180; ?>"  name="gradi" value ="<?php echo $pos[0];?>" style="width: 4em"><br>  
        Primi:&nbsp&nbsp&nbsp&nbsp<input id="p_mov" type="number" min="0" max="60" step="5" value="<?php echo $pos[1]; ?>" style="width: 4em" name="minuti"><br>  
        <input type="submit" value = "MoveTo">
</form>
</th>
</table>
</body>
</html>
