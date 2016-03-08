<!DOCTYPE HTML>
    <html>
        <head>
            <title>Pokedex - LP40</title>
            <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
            <script src="js/interactions.js"></script>
            <link rel="stylesheet" href="css/normalize.css">
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
            <h1 class="box">Pokedex</h1>
            <div class="clear"></div>
            <div class="interface box">
                <div class="list col_40 box">
                    <span id="index">Numéro</span><span id="name">Nom</span>
                    <ul class="list_pokemon">
                        <li class="pokemon_display_name"><span class="number"></span><a></a></li>
                    </ul>
                    <div class="scroller">
                        <div id="indicator"></div>
                    </div>
                </div>
                <div class="infos col_60 box">
                    
                </div>
            </div>
            <div class="clear"></div>
            <div class="menu box">
                <ul>
                    <li><a>Profil dresseur</a></li>
                    <li><a>Options</a></li>
                </ul>
            </div>
            
<?php
 
    $pokedex = new DomDocument();
    $pokedex->load('pokedex.xml');
    $racine = $pokedex->documentElement;
?>
        </body>
    </html>
