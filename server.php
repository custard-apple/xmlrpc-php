<?php
/*
 * PHP XMLRPC - How to create a XMLRPC Server
 */

//The easiest way to read an XMLRPC request is through the input stream
$request_xml = file_get_contents("php://input");

//create a basic demo method for the server to use
function say_hello($method_name, $args) {
    return "Hello ".$args[0];
}
function add($method_name, $args) {
    return "Addition = ". ($args[0]+$args[1]);
}
function reverse($method_name, $args) {
    return "Reverse Name = ". strrev($args[0]);
}
function search($method_name, $args) {
	$stateNames = array(
		"Alabama", "Alaska", "Arizona", "Arkansas", "California",
		"Colorado", "Columbia", "Connecticut", "Delaware", "Florida",
		"Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas",
		"Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan",
		"Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada",
		"New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina",
		"North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island",
		"South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont",
		"Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"
	);
$len= sizeof($stateNames); //51
$state="Not Found";
	for ($i=0; $i <$len-1 ; $i++) { 
		if ($i==$args[0]) {
			$state="";
			$state=$stateNames[$i];
		}
	}
    return "Your Search is : " . $state ;
}
function uuencode($method_name, $args) {
    return "Uuencode Value = ". convert_uuencode($args[0]);
}



//create the XMLRPC server
$xmlrpc_server = xmlrpc_server_create();

//register the demo method to the XMLRPC server
xmlrpc_server_register_method($xmlrpc_server, "say_hello", "say_hello");
xmlrpc_server_register_method($xmlrpc_server, "add", "add");
xmlrpc_server_register_method($xmlrpc_server, "search", "search");
xmlrpc_server_register_method($xmlrpc_server, "reverse", "reverse");
xmlrpc_server_register_method($xmlrpc_server, "uuencode", "uuencode");

//start the server listener
header('Content-Type: text/xml');
print xmlrpc_server_call_method($xmlrpc_server, $request_xml, array());

?>