<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

    <head>

        <?php
            /** Récupération de l'ID avec la méthode POST **/
            $id= $_POST['id'];

            /** Ouverture du xml et recherche du pokemon **/
            $pokedex = new DomDocument();
            $pokedex->validateOnParse = true;
            $pokedex->load('pokedex.xml');
            $pokemon = $pokedex->getElementsByTagName("pokemon")->item($id-1);
            echo "<title>Localisation de ".$pokemon->getElementsByTagName("nom")->item(0)->nodeValue."</title>";
        ?>
        
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

        <!-- API Google MAPS -->
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

        <!-- Fonction d'initialisation -->
        <script type="text/javascript">
            function initialisation() {
                var location = new google.maps.LatLng(24.735477, -77.894509);
                
                // Options d'affichage de la carte
                var options = {
                    center: location,
                    zoom: 9,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                //Consructeur de la carte
                var map = new google.maps.Map(document.getElementById("carte"), options);

                // Récupération du nom du pokémon par insertion de php
                var pokemon = '<?php echo $pokemon->getElementsByTagName("nom")->item(0)->nodeValue; ?>';

                // Les infos afficher
                var infowindow = new google.maps.InfoWindow({
                    content: "<div class='infoWindow'>Ici c'est "+pokemon+" </div>"
                });
    			
    			var infowindow2 = new google.maps.InfoWindow({
                    content: "<div class='infoWindow'>L'arêne</div>"
                });

                // Les marqeurs
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(24.763449, -78.311040),
                    map: map
                });
    			
    			var marker2 = new google.maps.Marker({
                    position: new google.maps.LatLng(25.041190, -77.350337),
                    map: map
                });

                // Ajout des d'evénement lors du clic sur un marqueur
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
                });
    			
    			google.maps.event.addListener(marker2, 'click', function() {
                    infowindow2.open(map,marker2);
                });
            }
        </script>
    </head>

    <body onload="initialisation()">
    <div id="carte" style="width:100%; height:100%"></div>
    </body>
</html>