<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://j.8u.cz/style.css">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="utf-8">
		<meta name="author" content="Jakub Pelc">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Controlling the LED Strip</title>
	</head>
	<body>
		<center>
		    <div class="text">IP:</div> <select id="ip1" name="ips">
                    <option value="192.168.0.">192.168.0.</option>
                    <option value="192.168.1">192.168.1.</option>
                    <option value="10.0.0.">10.0.0.</option>
                    <option value="10.0.1.">10.0.1.</option>
                </select>
                <select id="ip2" name="ips">
                    <?php
                        for($i = 0; $i <= 255; $i++){
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    ?>
                </select><br /><hr />
            <span class="text">Mode:</span><br /> <input id="mode" type="text"><br>
            <span class="text">Red:</span><br /> <input id="red" type="text"><br>
            <span class="text">Green:</span><br /> <input id="green" type="text"><br>
            <span class="text">Blue:</span><br /> <input id="blue" type="text"><br>
            <span class="text">A:</span><br /> <input id="a" type="text"><br>
            <span class="text">Delay:</span><br /> <input id="delay" type="text"><br>
            <button type="button" class="btn btn-success" onclick="redirecttoespressif();">Submit</button>
	    </center>
		<script>
		    function redirecttoespressif(){
		        var IP1 = document.getElementById("ip1").value;
		        var IP2 = document.getElementById("ip2").value;
		        var mode = document.getElementById("mode").value;
		        var red = document.getElementById("red").value;
		        var green = document.getElementById("green").value;
		        var blue = document.getElementById("blue").value;
		        var a = document.getElementById("a").value;
		        var delay = document.getElementById("delay").value;
		        var nm = mode.length;
		        var nr = red.length;
		        var ng = green.length;
		        var nb = blue.length;
		        var na = a.length;
		        var nd = delay.length;
		        
		        switch(nr){
		            case 0:
		                red = "000";
		            break;
		            case 1:
		                red = "00" + red;
		            break;
		            case 2:
		                red = "0" + red;
		            break;
		        }
		        
		        switch(ng){
		            case 0:
		                green = "000";
		            break;
		            case 1:
		                green = "00" + green;
		            break;
		            case 2:
		                green = "0" + green;
		            break;
		        }
		        
		        switch(nb){
		            case 0:
		                blue = "000";
		            break;
		            case 1:
		                blue = "00" + blue;
		            break;
		            case 2:
		                blue = "0" + blue;
		            break;
		        }
		        
		        switch(na){
		            case 0:
		                a = "000";
		            break;
		            case 1:
		                a = "00" + a;
		            break;
		            case 2:
		                a = "0" + a;
		            break;
		        }
		        
		        switch(nd){
		            case 0:
		                delay = "000";
		            break;
		            case 1:
		                delay = "00" + delay;
		            break;
		            case 2:
		                delay = "0" + delay;
		            break;
		        }
		        
		        if(nm > 1 || nr > 3 || ng > 3 || nb > 3 || na > 3 || nd > 3){}
		        else{
                            window.open("http://"+ IP1 + IP2 +"/get?input1="+ mode +"&input2="+ red +"&input3="+ green +"&input4="+ blue +"&input5="+ a +"&input6=" + delay);   
		        }
		    }
		</script>
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
