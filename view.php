<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
	function getStringValue(){
		$("#arguments").empty();
		$("#arguments").append(
			"<form name='myform' class='myform'><input type='text' class='num' name='greet_name' value='' placeholder='Enter Name'><br><br><button class='send_req' onclick='sendReq()'>Send Request</button><br></form>");
	}
	function getTwoIntValue(){
		$("#arguments").empty();
			$("#arguments").append(
				"<form name='myform' class='myform'><input type='number' class='num' name='num1' value=' ' placeholder='Enter Number 1'>\t<input type='number' class='num' name='num2' value=' ' placeholder='Enter Number 2'><br><br><button class='send_req' onclick='sendReq()'>Send Request</button><br></form>");
	}
	function getOneIntValue(){
		$("#arguments").empty();
			$("#arguments").append(
				"<form name='myform' class='myform'><input type='number' class='num' name='num1' value=' ' placeholder='Enter Number 1'><br><br><button class='send_req' onclick='sendReq()'>Send Request</button><br></form>");
	}
	function sendReq(e){
		event.preventDefault();
		var arg = $("#arguments .myform").serialize(); 
		var addInput;
		    $.ajax({
		        url 		:        'xmlview.php',
		        type 		:        'POST',
		        data 		:        arg,
		        success 	:         function(data) {
		        		/*alert("done "+data);*/
		            $('#resp').html(data);
		        }
		    });
	    	return false;
	}
</script>
<?php
	/*
	 * PHP XMLRPC - How to create a XMLRPC Server
	 */
	$method_name=$_POST['value'];
	session_start();
	$_SESSION['Method'] = $method_name;

	if ($method_name=="say_hello" OR
	    	$method_name=="reverse" OR
	    	$method_name=="uuencode"
	) 
	{
		echo '<script  type="text/javascript">'.
			'getStringValue()'.
		'</script>';
	}
	elseif ($method_name=="add") {
		echo '<script  type="text/javascript">'.
			'getTwoIntValue()'.
		'</script>';
	}
	elseif ($method_name=="search") {
		echo '<script  type="text/javascript">'.
			'getOneIntValue()'.
		'</script>';
	}
	else {
		/*echo '<script  type="text/javascript">'.
			'getStringValue()'.
		'</script>';*/
	}
	

	
	?>

