<!DOCTYPE HTML>
    <html>

    <?php
    $pokedex = new DomDocument();
    $pokedex->load('pokedex.xml');
    $pokemons = $pokedex->getElementsByTagName("pokemon");
    ?>

        <head>
            <title>Pokedex - LP40</title>
            <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
            <script src="js/interactions.js"></script>
            <link rel="stylesheet" href="css/normalize.css">
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
            <h1 class="box"><img src="img/pokeball.png" alt="pokeball"/>Pokedex</h1>
            <div class="clear"></div>
            <div class="interface box">
                <div class="list col_40 box">
                    <?php
                        foreach ($pokemons as $pokemon) {
                            echo "<form action='pokemon.php' method='POST'>";
                            echo "<span id='index'>".$pokemon->getAttribute("id")." : </span>";
                            echo "<input type='hidden' name='id' value='".$pokemon->getAttribute("id")."' />";
                            echo "<img src='https://www.pokebip.com/pokedex/images/sugimori/".(int)$pokemon->getAttribute("id").".png' class='imageGauche' alt='Bulbizarre' />";
                            echo "<input type='submit' value='".$pokemon->getElementsByTagName("nom")->item(0)->nodeValue."'/></form>";
                        }
                    ?>
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
        </body>
    </html>
