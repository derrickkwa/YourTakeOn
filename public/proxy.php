<?php
 
//open connection
$ch = curl_init();
$url = urldecode($_GET['url']);
 
curl_setopt($ch, CURLOPT_URL, $url);
 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
 
//prepare the field values being posted to the service
foreach ($_POST as $name => $value){
    $data[$name] = $value;
}
 
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 
//execute post
$result = curl_exec($ch);
 
//close connection
curl_close($ch);
 
echo $result;
?>