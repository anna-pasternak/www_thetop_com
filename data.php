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


print("<body background='weather.jpg'>");

foreach($response as $one)
{
	//print_r($item);
	echo "<p><p>";
	foreach($one as $two)
	{
		foreach($two as $three)
		{
			foreach($three as $four)
			{
				//var_dump($four);
				//if is_array($four) continue;	
if ( (array) $four !== $four ) { 
    //echo '$four is not an array'; 
	print($four);
	echo "<p><p>";
} else { 
    //echo '$four is an array';
	foreach($four as $five){
		print($five);
		echo "<p><p>";
	} 
}

			
				//print($four);				
				//echo "<p><p>";


			}
		}
	}
}


//echo $argv[0]." END".PHP_EOL;

