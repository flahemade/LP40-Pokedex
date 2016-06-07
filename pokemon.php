<!DOCTYPE HTML>
	<html>
		<head>
            <title>Pokedex - LP40</title>
        </head>
        <body>
        	<?php

        		$pokedex = new DomDocument();
        		$pokedex->validateOnParse = true;
    			$pokedex->load('pokedex.xml');

    			$id= $_POST['id'];
    			$pokemon = $pokedex->getElementById($id);

        		echo "<h1>".$id."</h1>";
        		echo "<span id='id'>ID : ".$id." </span></br>";
        		echo "<span id='nom'>Nom : ".$pokemon->getAttribute("id")." </span></br>";
        	?> 
        
        </body>


	</html>