<!DOCTYPE html>
<?php require_once 'simple_html_dom.php'; ?>
<html lang="de">
    <head>
        <title>FOSSGIS 2016 Programm</title>
        <meta name="description" content="FOSSGIS ist die Abk&uuml;rzung f&uuml;r Freie und Open Source Software f&uuml;r Geoinformationssysteme und ist die f&uuml;hrende Konferenz zu diesem Thema im deutschsprachigen Raum.">
        <meta name="keywords" content="FOSSGIS, Open Source, GIS, Konferenz, Geoinformatik, OpenStreetMap, OSM, Universität Passau">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">

        <link rel="stylesheet" type="text/css" href="/fonts/Droid_Sans_regular_bold.css" />
        <link href="../css/screen.css" type="text/css" rel="stylesheet" media="screen">
	<link type="text/css" href="programm.css" media="screen,print" rel="Stylesheet"/>
	<link type="text/css" href="extra.css" media="screen,print" rel="Stylesheet"/>	
    </head>
    
    <body id="programm">
      <div id="wrap">
        <?php include('../inc/head.inc'); ?>
	
        <div id="content">
	  
          <?php
	     include('../inc/nav.inc');
	     include('prog_nav.inc');
          ?>

          <h2>Event-Details</h2>
	  <?php

	     if (isset($_GET['id'])) {
	        $html = file_get_html("https://frab.fossgis-konferenz.de/de/2016/public/events/" . $_GET['id']);
	        $referent = $html->find('div[id=sidebar]', 0);
                $text = $html->find('div[id=basic]', 0);
                $info = $html->find('div[id=details]', 0);
	        //$info->find('h3', 1)->outertext = '';
	        //$info->find('ul', 0)->outertext = '';
	        $info->find('div[id=concurrent_events]', 0)->outertext = '';
                $topic = $html->find('div[id=main-content]', 0)->find('h2', 0)->innertext;

	  $info = str_replace("/system/event_attachments/", "https://frab.fossgis-konferenz.de/system/event_attachments/", $info);
	  $info = str_replace("/attachments/original/", "https://frab.fossgis-konferenz.de/de/attachments/original/", $info);
          $info = str_replace("/de/2016/public/events/", "https://frab.fossgis-konferenz.de/de/2016/public/events/", $info);
	  
                $info = preg_replace('/de\/2016\/public\/schedule\/([0-9]+)/', '2016/programm/day\1.php', $info);
          $referent = str_replace("/assets/person_small-6becbdd9bedc5ac3962dfb66f90e5ebb8fdbb97c287002e97bba3762a122a2bf.png", "/2016/programm/avatars/unknown-small.png", $referent);
          $referent = preg_replace('/\/system\/people\/avatars\/000\/00(.)\/(...)\/small\/[^"]*\.(...)\?[0-9]+/', '/2016/programm/avatars/small-\1\2.\3', $referent);
          $referent = preg_replace('/small-0+([0-9]+)/', 'small-\1', $referent);
          $referent = preg_replace('/small-([0-9]+).JPG/', 'small-\1.jpg', $referent);
                $referent = str_replace("de/2016/public/speakers/", "2016/programm/speaker.php?id=", $referent);
                $referent = str_replace("/assets/", "https://frab.fossgis-konferenz.de/assets/", $referent);
                $referent = str_replace("/system/", "https://frab.fossgis-konferenz.de/system/", $referent);
                $text = str_replace("/assets/", "https://frab.fossgis-konferenz.de/assets/", $text);
                $text = str_replace("/system/", "https://frab.fossgis-konferenz.de/system/", $text);
	  
                echo "<h3>" . $topic . "</h3>";
                echo $referent;
	  echo $text;
          echo $info;	  
	     }
          ?>
	  
	</div>
	<?php include('../inc/footer.inc'); ?>
      </div>
    </body>
</html>
