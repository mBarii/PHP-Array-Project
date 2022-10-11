<?php 

$dir = 'a_mov';
$files = scandir($dir);

//pre_r($files);

function pre_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

$files = array_diff($files, array('..','.'));

$files = array_values($files);

$movies = array();

for ($i = 0; $i < count($files); $i++) {
	preg_match("!(.*?)\((.*?)\)!",$files[$i],$results);
	$movie_name = str_replace('_', ' ', $results[1]);
	$movie_name = ucwords($movie_name);

	$movies[$movie_name]['image'] = $files[$i];
	$movies[$movie_name]['year'] = $results[2];
}

echo "<table id = 'a_mov' cellpadding = 50>";
echo "<tr class = 'odd'>";

foreach ($movies as $movie_name => $info) {
	$content = "<td><span class = 'name'>$movie_name</span><br />"
	. "<img src = 'a_mov/$info[image]'><br />"
	. "<span class = 'year'>( $info[year] )</span></td>";
	echo $content;
}

echo "</tr></table>";

?>


<style>
	#movies {
		background-color: #000;
		color: #fff;
		font: 11pt Calibri;
	}
	tr.header {
		background-color: #111f4e;
		color: #fff;
		font: bold 11pt Calibri;
	}
	tr.odd{
		background-color: #18182b;
	}
	tr.even{
		background-color: #141423;
	}
	img{
		padding: 10px;
	}
	td{
		text-align: center;
	}
	span.year{
		color: #ccc;
		font-size: 50px;
	}
	span.name{
		color: #ccc;
		font-size: 50px;
		font-weight: bold;
	}
	body{
		margin: 0;
		padding: 0
	}
</style>