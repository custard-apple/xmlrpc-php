<html>
<head>
	<title>Simple PHP XML-RPC Demo</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script>
		function method_click(rec){
		    $.ajax({
		        url:        'view.php',
		        type:       'POST',
		        data:       "value="+rec,
		        success:    function(data) {
		        	/*alert("done "+data);*/
		            $('#resp').html(data);
		        }
		    });
		}
	</script>
</head>
<body>
	<form class="rpc_form" action="index.php" method="post" accept-charset="utf-8">
		<h1>Simple PHP XML-RPC Demo</h1>
		<br>
		<select name="method" class="rpc_select" onChange="method_click(this.value)" >
			<option value="">Select</option>
			<option value="say_hello">Say Hello</option>
			<option value="add">Addition</option>
			<option value="search">Search State</option>
			<option value="reverse">Reverse String</option>
			<option value="uuencode">Uuencode String</option>
		</select><br><br>
		<div id="arguments"></div>
		<br><br>
		<div id="resp" name="resp"></div>
	</form>
	
</body>