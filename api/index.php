<?php 
	$mysqli = new mysqli('database.host.com', 'username', 'password', 'databasename');
	!$mysqli->connect_errno or die("Error while connecting to SQL"); 
?>

<?php
	$incolor = $_GET["color"];
        $color = str_replace(' ', '', $incolor);

    $sql = "SELECT * FROM homeapi WHERE ID = 1";
	$result = $mysqli->query($sql);
    
    while($row = $result->fetch_assoc())
	{
	    $red_sql = $row["red"];
	    $mode_sql = $row["mode"];
	    $green_sql = $row["green"];
	    $blue_sql = $row["blue"];
	    $a_sql = $row["a"];
	    $delay_sql = $row["delay"];
	    $apikey = $row["apikey"];
	    $ngrokid = $row["ngrokid"];
	}
	
$sql = "SELECT * FROM colors WHERE colorname = '".$mysqli->real_escape_string($color)."'";
	$result = $mysqli->query($sql);
    
    while($row = $result->fetch_assoc())
	{
	    $color_hex = $row["hexcode"];
	}
	$mysqli -> close();
	
    if($_GET["key"] == $apikey)
    {
        $mode = $_GET["mode"];
        $red = $_GET["red"];
        $green = $_GET["green"];
        $blue = $_GET["blue"];
        $a = $_GET["a"];
        $delay = $_GET["delay"];
        $hex = $_GET["hex"];
        if(isset($_GET["color"]) && !isset($_GET["hex"]) && $color != "")
	{
             list($r, $g, $b) = sscanf("#".$color_hex, "#%02x%02x%02x");
             $red = $r;
             $green= $g;
             $blue = $b;
        }
        
        if(isset($_GET["hex"]) && !isset($_GET["color"]))
        {
            echo $hex ."\n";
            list($r, $g, $b) = sscanf("#".$hex, "#%02x%02x%02x");
            $red = $r;
            $green= $g;
            $blue = $b;
        }
        
        switch(strlen($red))
        {
		    case 0:
		        $red = "000";
		    break;
		    case 1:
		        $red = "00" . $red;
		    break;
		    case 2:
		        $red = "0" . $red;
		    break;
	    }
		        
		switch(strlen($green))
		{
		    case 0:
		        $green = "000";
		    break;
		    case 1:
		        $green = "00" . $green;
		    break;
		    case 2:
		        $green = "0" . $green;
		    break;
		}
		        
		switch(strlen($blue))
		{
		    case 0:
		        $blue = "000";
		    break;
		    case 1:
		        $blue = "00" . $blue;
		    break;
		    case 2:
		        $blue = "0" . $blue;
		    break;
	    }
		        
		switch(strlen($a))
		{
		    case 0:
		        $a = "000";
		    break;
		    case 1:
		        $a = "00" . $a;
		    break;
		    case 2:
		        $a = "0" . $a;
		    break;
		}
		        
		switch(strlen($delay))
		{
		    case 0:
		        $delay = "000";
		    break;
		    case 1:
		        $delay = "00" . $delay;
		    break;
		    case 2:
		        $delay = "0" . $delay;
		    break;
		}
        echo $red."\n".$green."\n".$blue."\n";
        $url = "http://" . $ngrokid . ".ngrok.io/get?input1=" . $mode . "&input2=" . $red . "&input3=" . $green . "&input4=" . $blue . "&input5=" . $a . "&input6=" . $delay;
        echo $url;
        if(!isset($nosend))
        {
            //header("Location: http://" . $ngrokid . ".ngrok.io/get?input1=" . $mode . "&input2=" . $red . "&input3=" . $green . "&input4=" . $blue . "&input5=" . $a . "&input6=" . $delay);
            header("Location: ".$url);
        }
    }
    else
    {
        die("Wrong or missing acces key!");
    }
?>

<html>
    <head>
        <title>Home API Homepage</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="utf-8">
		<meta name="author" content="Jakub Pelc">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
    </head>
    <!--<body onload="drawcanvas("<?php /*echo($red_sql.",".$green_sql.",".$blue_sql.",".$a_sql.",".$red.",".$green.",".$blue.",".$a);");"*/?>>-->
    <body>
        <div id="page-wrapper">
            <h2>Home API for controlling Neopixel RGB LED strips w/<a href="https://github.com/kubakubakuba/led-strip-server/tree/code">https://github.com/kubakubakuba/led-strip-server/tree/code</a></h2>
            <!--<div id="grid-wrapper">
                <div id="row1">
                    <div id="col1">
                        <h3>SQL Data</h3>
                    </div>
                    <div id="col2">
                        <h3>Your Data</h3>
                    </div>
                    <div id="col3">
                        <h3></h3>
                    </div>
                </div>
                <div id="row2">
                    <div id="col1">
                        <canvas id="sqlcanv" height=200 width=200></canvas>
                    </div>
                    <div id="col2">
                        <canvas id="usrcanv" height=200 width=200></canvas>
                    </div>
                    <div id="col3"></div>
                </div>
                <div id="row3">
                    <div id="col1"></div>
                    <div id="col2"></div>
                    <div id="col3"></div>
                </div>-->
            </div>
            <script>
                /*function drawcanvas(var r, var g, var b, var a, var sr, var sg, var sb, var sa)
                {
                    var canvas1 = document.getElementById("sqlcanv");
                    var ctx1 = canvas1.getContext("2d");
                    var canvas2 = document.getElementById("usrcanv");
                    var ctx2 = canvas2.getContext("2d");
                    ctx1.fillStyle = 'rgba('+ sr +', '+ sg +', '+ sb +', '+ sa +')';
                    ctx1.fillRect(0, 0, canvas1.width, canvas1.height);
                    ctx2.fillStyle = 'rgba('+ r +', '+ g +', '+ b +', '+ a +')';
                    ctx2.fillRect(0, 0, canvas2.width, canvas2.height);
                }*/
            </script>
        </div>
    </body>
</html>
