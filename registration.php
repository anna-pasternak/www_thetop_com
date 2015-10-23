<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');


$client = new rabbitMQClient("RabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

$request = array();
$request['type'] = "register";
$request['username'] = $_POST["username"];
$request['password'] = $_POST["password"];
$request['email'] = $_POST["email"];
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

//echo "client received response: ".PHP_EOL;
//print_r($response);
//echo "$response[returnCode]\n\n";

//echo $argv[0]." END".PHP_EOL;

if ( $response[returnCode] == 2)
{
	header('Location: index.html');
}

if ( $response[returnCode] == 3)
{
	header('Location: registration.html');
}

?>
