<!DOCTYPE HTML>
    <html>

    <?php
    $pokedex = new DomDocument();
    $pokedex->load('pokedex.xml');
    $pokemons = $pokedex->getElementsByTagName("pokemon");
    ?>

        <head>
            <title>Pokedex - LP40</title>
            <script src="//code.jquery.com/jquery-1.12.0.min.js"  type="text/javascript"></script>
            <script src="js/interactions.js"  type="text/javascript"></script>
            <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css" />
            <script src="css/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <link rel="stylesheet" href="css/normalize.css" />
            <link rel="stylesheet" href="css/style.css" />
        </head>
        <body>
            <h1><img src="img/pokeball.png" alt="pokeball"/>Pokédex</h1>
            <div class="clear"></div>
            <div class="interface box row">
                <div class="list col-md-4 col-xs-6 col-md-offset-1 box">
                    <?php
                        foreach ($pokemons as $pokemon) {
                            echo "<form action='pokemon.php' method='POST'>";
                            echo "<span id='index'>".$pokemon->getAttribute("id")." : </span>";
                            echo "<input type='submit' value='".$pokemon->getElementsByTagName("nom")->item(0)->nodeValue."'/>";
                            echo "<input type='hidden' name='id' value='".$pokemon->getAttribute("id")."' />";
                            echo "<img src='https://www.pokebip.com/pokedex/images/sugimori/".(int)$pokemon->getAttribute("id").".png' class='imageGauche' alt='Bulbizarre' /></form>";
                        }
                    ?>
                    <ul class="list_pokemon">
                        <li class="pokemon_display_name"><span class="number"></span><a></a></li>
                    </ul>
                    <div class="scroller">
                        <div id="indicator"></div>
                    </div>
                </div>
                <div class="infos col-md-5 col-xs-6 col-md-offset-1 box">
                </div>
            </div>
            <div class="clear"></div>
            <div class="menu box">
                <ul>
                    <li><a>Profil dresseur</a></li>
                    <li><a>Options</a></li>
                </ul>
            </div>
            <div>
            <?php
    require_once('TwitterAPIExchange.php');

    /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
    $settings = array(
        'oauth_access_token' => "739837424474415104-JB9GxxCihhcO6TO2RoBN2sdntopv5Rn",
        'oauth_access_token_secret' => "z4pq7WASBNIXnL6H9dcIFdZ4zvyzQHzYyuS1wEEEQDamC",
        'consumer_key' => "Zv1zunV1orw9MIECfhr2JNfBI",
        'consumer_secret' => "P0Xkl03JSp2VO4dHqPyUtRQ7lqzuO4NXIfQ6ARL8S3WUvVEY1X"
    );

    $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    $getfield = '?screen_name=ProfOak&include_rts=false&count=10';
    $requestMethod = 'GET';
    $twitter = new TwitterAPIExchange($settings);
    $strJson =  $twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest();

    echo "\n";
         
    $arrTweets = json_decode($strJson,true);
    //var_dump($arrTweets);

    foreach ($arrTweets as $tweet){
        echo $tweet["user"]["name"]. " : ";
        echo $tweet["text"]."<br/>";
    }
?>
            </div>
        </body>
    </html>
