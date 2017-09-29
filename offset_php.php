<?php
if ($_GET){
	$gradi=$_GET["gradi"];
	$primi=$_GET["minuti"];
}
else {
	$gradi=$argv[1];
	$primi=$argv[2];
}
echo $gradi."<br>";
echo $primi."<br>";
$step=(int)(($gradi+$primi/60)/0.0878906);
echo $step."<br>";
exec("echo '".$step."' > /var/www/html/node/offset.dat");
//echo '<a href="./index.html" target="_parent"></a>';
?>
<script type="text/javascript">
    window.parent.location.reload();
</script>
<!--<meta http-equiv="refresh" content="0;  url=offset.php">-->
