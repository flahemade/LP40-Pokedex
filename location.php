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

                var latitude = '<?php echo $pokemon->getElementsByTagName("latitude")->item(0)->nodeValue; ?>';
                var longitude = '<?php echo $pokemon->getElementsByTagName("longitude")->item(0)->nodeValue; ?>';

                var location = new google.maps.LatLng(latitude, longitude);
                
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

                // Les infos affichées
                var infowindow = new google.maps.InfoWindow({
                    content: "<div class='infoWindow'>Ici c'est "+pokemon+" </div>"
                });

                // Les marqeurs
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    map: map
                });

                // Ajout des evénements lors du clic sur un marqueur
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
                });
            }
        </script>
    </head>

    <body onload="initialisation()">
    <div id="carte" style="width:100%; height:100%"></div>
    </body>
</html>