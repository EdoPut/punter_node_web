<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border-style: none;
    text-align :center;
}
</style>

<!--<script type="text/javascript" src="offset.php"></script>-->
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
?>
<body>
<?php
        $of=read_offset();
?>
<table  align="center" border="5">
<th>
<form action="offset_php.php">
	Gradi:&nbsp&nbsp&nbsp<input type="number" min="0" max="359"  name="gradi" value ="<?php echo $of[0]; ?>" style="width: 4em"><br>  
        Primi:&nbsp&nbsp&nbsp&nbsp<input type="number" min="0" max="59" step="5" value="<?php echo $of[1]; ?>" style="width: 4em" name="minuti"><br>  
        <input type="submit" value="Set Offset">
</form>
</th>
</table>
</body>
</html>
