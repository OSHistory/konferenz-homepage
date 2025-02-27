<!doctype html>
<html lang="de">

<head>
	<?php include "../inc/meta.inc"; ?>

	<base href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>">
	<title>FOSSGIS 2022 - Team</title>

	<link rel="stylesheet" href="./css/normalize.css">
	<link rel="stylesheet" href="./css/base.css">
</head>

<body id="team">

	<?php include "../inc/header.inc"; ?>

	<h2>Das Konferenz-Team</h2>
	
	<ul class="tiles">

	<?php

	$file = 'loc.csv';
	$handle = fopen($file, 'r');

	while ($data = fgetcsv($handle, 1000, "|")) {
		$name = $data[0];
		$link = $data[1];
		$img = $data[2] ? $data[2] : "./img/fossgis22-logo.png";
		$desc = $data[3];

		if ($link) {
			echo  "<li class='tile team'>"
				. "  <a href='{$link}' target='_blank'>"
				. "    <img src='{$img}' alt='{$name}' />"
				. "  </a>"
				. "  <p>"
				. "    <a href='{$link}' target='_blank'>"
				. "      <b>{$name}</b><br>"
				. "    </a>"
				. "    <small>{$desc}</small>"
				. "  </p>"
				. "</li>";
		} else {
			echo  "<li class='tile team'>"
				. "  <img src='{$img}' alt='{$name}' />"
				. "  <p>"
				. "    <b>{$name}</b><br>"
				. "    <small>{$desc}</small>"
				. "  </p>"
				. "</li>";
		}
	}

	fclose($handle);

	?>

	</ul>

	<?php include('../inc/footer.inc'); ?>

</body>

</html>
