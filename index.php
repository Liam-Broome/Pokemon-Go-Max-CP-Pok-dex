<style>

	body {
		background: -webkit-linear-gradient(180deg, #9bcc50 50%, #9bcc50 50%)
	}

	.bordered {
		border: solid black;
	}

	table {
		border-collapse: collapse;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	th {
		font-size: 150%;
	}

	td {
		text-align: center;
		font-size: 145%;
	}

	th, td {
		padding: 5px;
		font-family: arial,sans-serif;
		color: #000000;
	}

	img {
		width:150px;
		height:150px;
	}

	.pokemon-background {
		background-color: #30a7d7;
	}

	span {
		font-size: 50%;
		color: #000000;
		font-family: arial,sans-serif;
	}

	.green {
		background: -webkit-linear-gradient(180deg, #9bcc50 50%, #9bcc50 50%)
	}
	
	.yellow {
		background-color: #ffcb07;
	}

	.red {
		background-color: #E3350D;
	}

</style>#

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<?php 

	$response = file_get_contents('https://pogoapi.net/api/v1/pokemon_max_cp.json');
	$table = '<button id="button">goto</button>';
	$table .= '<table>';
	$table .= '<th colspan="3"></th>';
	foreach (json_decode($response) AS $key => $value){
		if ($value->form == 'Normal'){
			$table .= '<tr id="' . $value->pokemon_id . '">';
			$table .= '<td class="pokemon-background bordered"><img src="' . 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/' . $value->pokemon_id . '.png"/></td>';  		
			$table .= '<td class="bordered red" colspan="2">';
			$table .= '<span>Max CP</span><br>'; 
			$table .=  $value->max_cp . '</td>';	
			$table .=  '</tr>';	
			$table .=  '<tr>';
			$table .=  '<td class="bordered yellow" style="border-right:none;">' . $value->pokemon_name . '<br><span>#'; 
			$table .= sprintf("%03d", $value->pokemon_id); 
			$table .=  '</span></td>';	
			$table .=  '<td colspan="2" class="bordered yellow" style="border-left:none;"></td>';	
			$table .=  '</tr>';	
		}
	}
	$table .=  '</table><script>';
	$table .= '$("#button").click(function() {';
	$table .= '$("html, body").animate({ ';
	$table .= 'console.log("dsfs");';
	$table .= 'scrollTop: $("#50").offset().top';
	$table .= '}, 2000);';
	$table .= '});</script>';
	die($table);
?>

