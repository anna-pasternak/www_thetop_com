<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');


$client = new rabbitMQClient("RabbitMQ.ini","robinServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

$request = array();
$request['type'] = "getData";
$request['username'] = "martinTest2";
$request['password'] = "password";
$request['email'] = "martinTest2@njit.edu";
$request['message'] = $msg;
$response = $client->send_request($request);


//$response = $client->publish($request);

//echo "client received response: ".PHP_EOL;
//print_r($response);

//$neat = var_dump($response);

//$myFile = "log.txt";
//$fh = fopen($myFile, 'a') or die("Can't open file");
//fwrite($fh, $neat);
//fwrite($fh, "\n\n");
//fclose($fh);

//var_dump($response);

foreach($response as $item)
{
	//print_r($item);
	echo "<p><p>";
	foreach($item as $value)
	{
		print_r($value);
		echo "<p><p>";
	}
}

//echo $argv[0]." END".PHP_EOL;

