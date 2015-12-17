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
$request['message'] = $msg;
$response = $client->send_request($request);



print("
<head>
<title>New Jersey Weather</title>
<style>
table, th, td {
    
    padding: 5px;
    
}
table {
    border-spacing: 5px;
}
#bigbox { border-radius: 20px; background:  #b3b3b3; }
#titlebox { border-radius: 10px; width:175px; background:  #eeeeee; }
#infobox { border-radius: 20px; height:180px; width:175px; background:  #eeeeee; }
</style>
</head>
");
print("<body background='weather.jpg'>");

print('<font color="white" align="center"><h1>New Jersey Weather</h1></font>');

print('
<center><table <fieldset id = "bigbox">
    <thead>
        <tr>
            <th><fieldset id = "titlebox">');
	    print($response["0"]["0"]["city"]);
            print('</font></th>
            <th><fieldset id = "titlebox">');
	    print($response["1"]["0"]["city"]);
	    print('</font></th>
            <th><fieldset id = "titlebox">');
	    print($response["2"]["0"]["city"]);
	    print('</font></th>
            <th><fieldset id = "titlebox">');
	    print($response["3"]["0"]["city"]);
	    print('</font></th>
            <th><fieldset id = "titlebox">');
	    print($response["4"]["0"]["city"]);
	    print('</font></th>
 
        </tr>
    </thead>
    <tbody>

        <td <fieldset id = "infobox">');
	print('Temperature: '.$response["0"]["0"]["temp"]);
	print("<p>");
	print('Condition: '.$response["0"]["0"]["weather"]);
	print("<p>");
	print('Wind: '.$response["0"]["0"]["wind"]);
	print('</font></td>

        <td <fieldset id = "infobox">');
	print('Temperature: '.$response["1"]["0"]["temp"]);
	print("<p>");
	print('Condition: '.$response["1"]["0"]["weather"]);
	print("<p>");
	print('Wind: '.$response["1"]["0"]["wind"]);	
	print('</font></td>

        <td <fieldset id = "infobox">');
	print('Temperature: '.$response["2"]["0"]["temp"]);
	print("<p>");
	print('Condition: '.$response["2"]["0"]["weather"]);
	print("<p>");
	print('Wind: '.$response["2"]["0"]["wind"]);
	print('</font></td>

        <td <fieldset id = "infobox">');
	print('Temperature: '.$response["3"]["0"]["temp"]);
	print("<p>");
	print('Condition: '.$response["3"]["0"]["weather"]);
	print("<p>");
	print('Wind: '.$response["3"]["0"]["wind"]);
	print('</font></td>

        <td <fieldset id = "infobox">');
	print('Temperature: '.$response["4"]["0"]["temp"]);
	print("<p>");
	print('Condition: '.$response["4"]["0"]["weather"]);
	print("<p>");
	print('Wind: '.$response["4"]["0"]["wind"]);
	print('</font></td>
   
    </tbody>

    <thead>
        <tr>
            <th><fieldset id = "titlebox">');
	    print($response["5"]["0"]["city"]);
            print('</font></th>
            <th><fieldset id = "titlebox">');
	    print($response["6"]["0"]["city"]);
	    print('</font></th>
            <th><fieldset id = "titlebox">');
	    print($response["7"]["0"]["city"]);
	    print('</font></th>
            <th><fieldset id = "titlebox">');
	    print($response["8"]["0"]["city"]);
	    print('</font></th>
            <th><fieldset id = "titlebox">');
	    print($response["9"]["0"]["city"]);
	    print('</font></th>
 
        </tr>
    </thead>
    <tbody>

        <td <fieldset id = "infobox">');
	print('Temperature: '.$response["5"]["0"]["temp"]);
	print("<p>");
	print('Condition: '.$response["5"]["0"]["weather"]);
	print("<p>");
	print('Wind: '.$response["5"]["0"]["wind"]);
	print('</font></td>

        <td <fieldset id = "infobox">');
	print('Temperature: '.$response["6"]["0"]["temp"]);
	print("<p>");
	print('Condition: '.$response["6"]["0"]["weather"]);
	print("<p>");
	print('Wind: '.$response["6"]["0"]["wind"]);	
	print('</font></td>

        <td <fieldset id = "infobox">');
	print('Temperature: '.$response["7"]["0"]["temp"]);
	print("<p>");
	print('Condition: '.$response["7"]["0"]["weather"]);
	print("<p>");
	print('Wind: '.$response["7"]["0"]["wind"]);
	print('</font></td>

        <td <fieldset id = "infobox">');
	print('Temperature: '.$response["8"]["0"]["temp"]);
	print("<p>");
	print('Condition: '.$response["8"]["0"]["weather"]);
	print("<p>");
	print('Wind: '.$response["8"]["0"]["wind"]);
	print('</font></td>

        <td <fieldset id = "infobox">');
	print('Temperature: '.$response["9"]["0"]["temp"]);
	print("<p>");
	print('Condition: '.$response["9"]["0"]["weather"]);
	print("<p>");
	print('Wind: '.$response["9"]["0"]["wind"]);
	print('</font></td>
   
    </tbody>
</table></center>
');

?>

