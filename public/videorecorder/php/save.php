<?php

  $streamId = $_GET['id'].'.flv';
  //$streamId = 'sttemanihdhxcsfxs.flv';
  $red5_dir = '/usr/share/red5/webapps/oflaDemo/streams/';  
  $base_dir = '/usr/share/red5/webapps/oflaDemo/streams/yto_vids/';  
  
  copy($red5_dir.$streamId ,  $base_dir.$streamId );
  
  $path=$red5_dir.$streamId;
  if(@unlink($path)) {echo "Deleted file "; }
  else{echo "File can't be deleted";} 

?> 
