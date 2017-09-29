<?php
exec("echo 'mov 1000,11,1' >stepp.tmp");
exec("echo 'stop 0' >> stepp.tmp");
exec("cp  stepp.tmp motor.mpp");
?>
<meta http-equiv="refresh" content="0; url=stepp.php">
