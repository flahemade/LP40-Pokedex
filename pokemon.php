<!DOCTYPE HTML>
	<html>
		<head>
            <title>Pokedex - LP40</title>
        </head>
        <body>
        	<?php
        		/** Récupération de l'ID avec la méthode POST **/
        		$id= $_POST['id'];

        		/** OUverture du xml et recherche du pokemon **/
        		$pokedex = new DomDocument();
        		$pokedex->validateOnParse = true;
    			$pokedex->load('pokedex.xml');
    			$pokemon = $pokedex->getElementsByTagName("pokemon")->item($id-1);

    			/** Titre **/
        		echo "<h1>".$pokemon->getElementsByTagName("nom")->item(0)->nodeValue."</h1>";

        		/** Image **/
        		echo "<img src='https://www.pokebip.com/pokedex/images/sugimori/".(int)$id.".png' class='imageGauche' alt='Bulbizarre' /></br>";

        		/** ID **/
        		echo "<span id='id'>ID : ".$id."</span></br>";

        		/** Nom **/
        		echo "<span id='nom'>Nom : ".$pokemon->getElementsByTagName("nom")->item(0)->nodeValue."</span></br>";

				/** Types **/
        		$types = $pokemon->getElementsByTagName("type");
        		echo "<span id='types'>Type(s) :";
        			foreach ($types as $type){
        				echo " ".$type->nodeValue;
        			}
        		echo "</span></br>";

        		/** Taille **/
        		echo "<span id='taille'>Taille : ".$pokemon->getElementsByTagName("taille")->item(0)->nodeValue."</span></br>";

        		/** Poids **/
        		echo "<span id='poids'>Poids : ".$pokemon->getElementsByTagName("poids")->item(0)->nodeValue."</span></br>";

        		/** Taux de capture **/
        		echo "<span id='taux_capture'>Taux de capture : ".$pokemon->getElementsByTagName("taux_capture")->item(0)->nodeValue."</span></br>";

        		/** Experience max **/
        		echo "<span id='experience_max'>Experience max : ".$pokemon->getElementsByTagName("experience_max")->item(0)->nodeValue."</span></br>";

        		/** Bonheur **/
        		echo "<span id='bonheur'>Bonheur : ".$pokemon->getElementsByTagName("bonheur")->item(0)->nodeValue."</span></br>";

        		/** Évolutions **/
        		$evolutions = $pokemon->getElementsByTagName("evolution");
        		echo "<span id='evolutions'>Evolution(s) :";
        			foreach ($evolutions as $evolution){
        				echo " ".$evolution->nodeValue;
        			}
        		echo "</span></br>";

        		/** Description **/
        		echo "<span id='description'>Description : ".$pokemon->getElementsByTagName("description")->item(0)->nodeValue."</span></br>";

        		/** Point de vie **/
        		echo "<span id='points_de_vie_valeur'>Points de vie : ".$pokemon->getElementsByTagName("points_de_vie_valeur")->item(0)->nodeValue."</span></br>";

        		/** Attaque **/
        		echo "<span id='attaque_valeur'>Attaque : ".$pokemon->getElementsByTagName("attaque_valeur")->item(0)->nodeValue."</span></br>";

        		/** Défense **/
        		echo "<span id='defense_valeur'>Defense : ".$pokemon->getElementsByTagName("defense_valeur")->item(0)->nodeValue."</span></br>";

        		/** Attaque spéciale **/
        		echo "<span id='attaqueSpe_valeur'>Attaque spéciale : ".$pokemon->getElementsByTagName("attaqueSpe_valeur")->item(0)->nodeValue."</span></br>";

        		/** Défense spéciale **/
        		echo "<span id='defenseSpe_valeur'>Défense spéciale : ".$pokemon->getElementsByTagName("defenseSpe_valeur")->item(0)->nodeValue."</span></br>";

        		/** Vitesse **/
        		echo "<span id='vitesse_valeur'>Vitesse : ".$pokemon->getElementsByTagName("vitesse_valeur")->item(0)->nodeValue."</span></br>";
        	?> 
        
        </body>

	</html>