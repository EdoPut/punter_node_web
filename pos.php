<?php
$pos_mem="0";
  $pos="";
  $of="";
  exec("cat /var/www/html/node/pos.dat",$pos);
  exec("cat /var/www/html/node/offset.dat",$of);
  $pos_mem=$pos;
  $d=round(($pos[0]+$of[0])*0.0878906,4);
  $g=intval($d);
  $p=($d-intval($d))*60;
  $p=intval($p);
  $pp="";
  if ($p <0 and  $g==0){
  $pp="-";
  }
  $pp=$pp.$g."° ".abs($p)."'";
  echo $pp;
?>
