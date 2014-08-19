<?php
/*
 *	The Algebra Project
 *		No more Algebraec issues.
 */


$move_key = 1;


$e = array(
	"L" => array(
		array("operator" => "add", "operand" => array(0 => 5))
	),
	"R" => array(
		array("operator" => "add", "operand" => array(1 => 3, 2 => 2))
	)
);
function isolate($move_key, $e) {
	//	Let's make it 0 on the left side
	print_r($e);
	$e = remove_left($e);
	echo '<br>';
	print_r($e);
	//	Now we move (1=>3) to the left...
}
function remove_left($e) {
	//	Single-layered evaluation.
	foreach($e["L"] as $key => $val) {
		if(array_key_exists("operator", $val)) {
			$inversed = inverse_operation($val);
			array_push($e["R"], $val);
			unset($e["L"][$key]);
			return $e;
		}
	}
}

isolate($move_key, $e);

function inverse_operation($val) {
	if($val["operator"] == "add") {
		foreach($val["operand"] as $key => $op) {
			$val["operand"][$key] = $op * -1;
		}
	}
	return $val;
}


class operation {
	function __construct() {
		$this->operand = "add";
		$this->operation = array(5, 4);
	}
	function inverse() {

	}
	
}

?>

<html>
<head>
	<title>Algebra.com</title>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("h1, sup").mouseenter(function() {
				$(this).addClass("highlight", 200);
			}).mouseleave(function() {
				$(this).removeClass("highlight", 600);
			}).click(function() {
				$("explain").empty();
				$("explain").html(
					$("#e-"+$(this).attr("id")).html()
				);
			});
		});
	</script>
	<style>
		h1, equals, sup {
			font-size: 32px;
			display: inline-block;
			cursor: pointer;
			font-weight: bold;
		}

		body {
			text-align: center;
		}
		explain {
			display: block;
		}
		all_explanations {
			display: none;
		}
		.highlight {
			color: red;
		}
	</style>
</head>
<body>
<br>
	<h1 id="energy">E</h1>
	<equals> = </equals> 
	<h1 id="mass">m</h1>
	<h1 id="celeritas">c</h1><sup>2</sup>
	<explain>
	Explanation
	</explain>
	<all_explanations>
		<e id="e-energy">
			<i>E</i> stands for <i>Energy</i>.
		</e>
		<e id="e-mass">
			<i>m</i> stands for <i>mass</i>. It is measured in Kg (Kilograms).
		</e>
		<e id="e-celeritas">
			<i>c</i> stands for <i>celeritas</i>. It is the speed of light.
		</e>
	</all_explanations>
</body>
</html>
</html>
