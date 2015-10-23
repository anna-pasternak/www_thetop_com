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
$request['type'] = "login";
$request['username'] = $_POST["username"];
$request['password'] = $_POST["password"];
//$request['email'] = $POST_["email"];
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

//echo "client received response: ".PHP_EOL;
//print_r($response);
//echo "$response[returnCode]\n\n";

//echo $argv[0]." END".PHP_EOL;

if ( $response[returnCode] == 0)
{
	header('Location: data.php');
}

if ( $response[returnCode] == 1)
{
	header('Location: index.html');
}

?>