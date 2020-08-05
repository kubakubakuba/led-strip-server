<?php 
	$mysqli = new mysqli('database.host.com', 'username', 'password', 'databasename');
	!$mysqli->connect_errno or die("Error while connecting to SQL"); 
?>

<?php
    $red = 0;
    $green = 0;
    $blue = 0;
    $delay = 0;
    $a = 0;
    
    $colors = array(
        array('aliceblue','F0F8FF'),
        array('antiquewhite','FAEBD7'),
        array('aqua','00FFFF'),
        array('aquamarine','7FFFD4'),
        array('azure','F0FFFF'),
        array('beige','F5F5DC'),
        array('bisque','FFE4C4'),
        array('black','000000'),
        array('blanchedalmond ','FFEBCD'),
        array('blue','0000FF'),
        array('blueviolet','8A2BE2'),
        array('brown','A52A2A'),
        array('burlywood','DEB887'),
        array('cadetblue','5F9EA0'),
        array('chartreuse','7FFF00'),
        array('chocolate','D2691E'),
        array('coral','FF7F50'),
        array('cornflowerblue','6495ED'),
        array('cornsilk','FFF8DC'),
        array('crimson','DC143C'),
        array('cyan','00FFFF'),
        array('darkblue','00008B'),
        array('darkcyan','008B8B'),
        array('darkgoldenrod','B8860B'),
        array('darkgray','A9A9A9'),
        array('darkgreen','006400'),
        array('darkgrey','A9A9A9'),
        array('darkkhaki','BDB76B'),
        array('darkmagenta','8B008B'),
        array('darkolivegreen','556B2F'),
        array('darkorange','FF8C00'),
        array('darkorchid','9932CC'),
        array('darkred','8B0000'),
        array('darksalmon','E9967A'),
        array('darkseagreen','8FBC8F'),
        array('darkslateblue','483D8B'),
        array('darkslategray','2F4F4F'),
        array('darkslategrey','2F4F4F'),
        array('darkturquoise','00CED1'),
        array('darkviolet','9400D3'),
        array('deeppink','FF1493'),
        array('deepskyblue','00BFFF'),
        array('dimgray','696969'),
        array('dimgrey','696969'),
        array('dodgerblue','1E90FF'),
        array('firebrick','B22222'),
        array('floralwhite','FFFAF0'),
        array('forestgreen','228B22'),
        array('fuchsia','FF00FF'),
        array('gainsboro','DCDCDC'),
        array('ghostwhite','F8F8FF'),
        array('gold','FFD700'),
        array('goldenrod','DAA520'),
        array('gray','808080'),
        array('green','008000'),
        array('greenyellow','ADFF2F'),
        array('grey','808080'),
        array('honeydew','F0FFF0'),
        array('hotpink','FF69B4'),
        array('indianred','CD5C5C'),
        array('indigo','4B0082'),
        array('ivory','FFFFF0'),
        array('khaki','F0E68C'),
        array('lavender','E6E6FA'),
        array('lavenderblush','FFF0F5'),
        array('lawngreen','7CFC00'),
        array('lemonchiffon','FFFACD'),
        array('lightblue','ADD8E6'),
        array('lightcoral','F08080'),
        array('lightcyan','E0FFFF'),
        array('lightgoldenrodyellow','FAFAD2'),
        array('lightgray','D3D3D3'),
        array('lightgreen','90EE90'),
        array('lightgrey','D3D3D3'),
        array('lightpink','FFB6C1'),
        array('lightsalmon','FFA07A'),
        array('lightseagreen','20B2AA'),
        array('lightskyblue','87CEFA'),
        array('lightslategrey','778899'),
        array('lightsteelblue','B0C4DE'),
        array('lightyellow','FFFFE0'),
        array('lime','00FF00'),
        array('limegreen','32CD32'),
        array('linen','FAF0E6'),
        array('magenta','FF00FF'),
        array('maroon','800000'),
        array('mediumaquamarine','66CDAA'),
        array('mediumblue','0000CD'),
        array('mediumorchid','BA55D3'),
        array('mediumpurple','9370D0'),
        array('mediumseagreen','3CB371'),
        array('mediumslateblue','7B68EE'),
        array('mediumspringgreen','00FA9A'),
        array('mediumturquoise','48D1CC'),
        array('mediumvioletred','C71585'),
        array('midnightblue','191970'),
        array('mintcream','F5FFFA'),
        array('mistyrose','FFE4E1'),
        array('moccasin','FFE4B5'),
        array('navajowhite','FFDEAD'),
        array('navy','000080'),
        array('oldlace','FDF5E6'),
        array('olive','808000'),
        array('olivedrab','6B8E23'),
        array('orange','FFA500'),
        array('orangered','FF4500'),
        array('orchid','DA70D6'),
        array('palegoldenrod','EEE8AA'),
        array('palegreen','98FB98'),
        array('paleturquoise','AFEEEE'),
        array('palevioletred','DB7093'),
        array('papayawhip','FFEFD5'),
        array('peachpuff','FFDAB9'),
        array('peru','CD853F'),
        array('pink','FFC0CB'),
        array('plum','DDA0DD'),
        array('powderblue','B0E0E6'),
        array('purple','800080'),
        array('red','FF0000'),
        array('rosybrown','BC8F8F'),
        array('royalblue','4169E1'),
        array('saddlebrown','8B4513'),
        array('salmon','FA8072'),
        array('sandybrown','F4A460'),
        array('seagreen','2E8B57'),
        array('seashell','FFF5EE'),
        array('sienna','A0522D'),
        array('silver','C0C0C0'),
        array('skyblue','87CEEB'),
        array('slateblue','6A5ACD'),
        array('slategray','708090'),
        array('slategrey','708090'),
        array('snow','FFFAFA'),
        array('springgreen','00FF7F'),
        array('steelblue','4682B4'),
        array('tan','D2B48C'),
        array('teal','008080'),
        array('thistle','D8BFD8'),
        array('tomato','FF6347'),
        array('turquoise','40E0D0'),
        array('violet','EE82EE'),
        array('wheat','F5DEB3'),
        array('white','FFFFFF'),
        array('whitesmoke','F5F5F5'),
        array('yellow','FFFF00'),
        array('yellowgreen','9ACD32')
    );

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
        if(isset($_GET["color"]) && !isset($_GET["hex"]))
        {
            $incolor = $_GET["color"];
            $color = str_replace(' ', '', $incolor);
            for($i = 0; $i <= count($colors); $i++)
            {
                if($color == $colors[$i][0])
                {
                    list($r, $g, $b) = sscanf("#".$colors[$i][1], "#%02x%02x%02x");
                    $red = $r;
                    $green= $g;
                    $blue = $b;
                }
            }
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
