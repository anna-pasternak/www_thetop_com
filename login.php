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

$username = $_POST["username"];
$password = $_POST["password"];

//$username = mysql_real_escape_string($username);
//$password = mysql_real_escape_string($password);

$request = array();
$request['type'] = "login";
$request['username'] = $username;
$request['password'] = $password;

$request['message'] = $msg;
$response = $client->send_request($request);

if ( $response[returnCode] == 0)
{
	header('Location: data.php');
}

if ( $response[returnCode] == 1)
{
	header('Location: index.html');
}

?>
