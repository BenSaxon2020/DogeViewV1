<html>
<head>
<title>Doge View</title>
<link rel="stylesheet" href="style.css">
<meta http-equiv="refresh" content="60">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body class="container p-3 my-3 bg-dark text-white" onload=”javascript:setTimeout(“location.reload(true);”,60000);”>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$url=$_SERVER['REQUEST_URI'];
   header("Refresh: 60; URL=$url");
function read($json_a){
	$logtime = date('d/m/y' . "  	" . 'h:m:s',  $json_a["timestamp"]); 
	echo  "<h1 class='rainbow'>Logged at: ", 
	$logtime . "</h1>\n";
	echo "<h1 class='rainbow'>Current Time: ", date("d/m/y" . " " . "h:i:sa") . "</h1>\n";	
	//var_dump($json_a); die();
	if(empty($json_a["servers"])){
				echo '<div class="container bg">';
				echo "<h1 style='color:green;'>All Guchie</h1>";
				echo '<img src="nye.gif" height="500" width="1000" align="center">';
				echo '<img src="server_g.png" height="50" width="50" align="right">';
				echo '<img src="check-circle.svg" alt="" width="40" height="40" align="right" title="Bootstrap">';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '</div>';
	}
			else{
				check($json_a);
			}
}
function check($json_a){
	foreach ($json_a["servers"] as $key => $value) {
		foreach ($value as $info) {
			$status = $info["status"];
			if($status == "ERROR"){
				echo '<div class="container">';
				echo "<h1 class='rainbow';'>" . $key . "<br>" . $info["message"] . "</h1>\n"; 
				echo "<h1 class='rainbow'>Issue raised: " . $info["raised"] . "&nbsp;  - &nbsp;Update at: " . $info["updated"] . "</h1>\n"; 
				echo '<img src="server_r.png" height="50" width="50" align="right">';
				echo '<img src="alert-circle-fill.svg" alt="" width="40" height="40" align="right" title="Bootstrap">';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '</div>';
			} elseif($status == "WARNING"){
				echo '<div class="container">';
				echo "<h1 style='color:orange;'>" . $key . "<br>" . $info["message"] . "</h1>\n"; 
				echo "<h1 style='color:orange;'>Issue raised: " . $info["raised"] . "&nbsp;  - &nbsp;Update at: " . $info["updated"] . "</h1>\n"; 
				echo '<img src="server_r.png" height="50" width="50" align="right">';
				echo '<img src="alert-circle.svg" alt="" width="40" height="40" align="right" title="Bootstrap">';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '</div>';
			} else{
				echo '<div class="container">';
				echo "<h1 style='color:green;'>all Guchie</h1>";
				echo '<img src="server_g.png" height="50" width="50" align="right">';
				echo '<img src="check-circle.svg" alt="" width="40" height="40" align="right" title="Bootstrap">';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '</div>';
			}
		}
	}
}				
				$string = file_get_contents("data.json"); 
	$json_a = json_decode($string, true); 
				read($json_a);
				echo "<div>";
				echo '<img src="doge.gif" height="500px" width="1120px" align="center">';
				echo "</div>";
			echo "</body>\n";
echo "</html>";
