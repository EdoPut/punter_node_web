<?php
echo "start motor<br>";
if ($_GET){
	$gradi=$_GET["gradi"];
	$primi=$_GET["minuti"];
}
else {
	$gradi=$argv[1];
	$primi=$argv[2];
}
exec("cat pos.dat",$pos);
exec("cat offset.dat",$of);
echo $pos[0],"<br>";
$step=(int)(($gradi+$primi/60)/0.0878906);
echo $step,"<br>";
$step= $step-$pos[0]-$of[0];
echo $step,"<br>";
if ($step > 0){
	echo "positivo<br>";
	exec("echo 'mov 300,".$step.",1' > /var/www/html/node/motor.tmp");
}
else {
	$step=abs($step);
	exec("echo 'mov 300,".$step.",-1' > /var/www/html/node/motor.tmp");
}
exec("echo 'stop 0' >> /var/www/html/node/motor.tmp");
exec("cp /var/www/html/node/motor.tmp /var/www/html/node/motor.mpp");
//header("http:./index.html");
?>
<meta http-equiv="refresh" content="0; url=motor.php">
