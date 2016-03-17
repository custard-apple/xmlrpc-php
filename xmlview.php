<?php
	//Get the method name by session
	session_start();
	$method_name= $_SESSION['Method'];

	//Get the value of form field as parameter
	$data = array();
	foreach ($_POST as $key => $value) {
		$data[] = $value;
	}

	//URL of the XMLRPC Server
	$server = 'http://localhost/rpc1/server.php';

	//call the methods of the XMLRPC Server by $method_name parameter
	//and pass $data as the first parameter
	$request = xmlrpc_encode_request($method_name, $data);
	
	//create the stream context for the request
	$context = stream_context_create(array('http' => array(
	    'method' => "POST",
	    'header' => "Content-Type: text/xml\r\nUser-Agent: PHPRPC/1.0\r\n",
	    'content' => $request
	)));

	$file = file_get_contents($server, false, $context);
	
	//decode the XMLRPC response
	$response = xmlrpc_decode($file);


	//display the response
	echo $response;
?>