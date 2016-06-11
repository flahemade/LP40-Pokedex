<!DOCTYPE HTML>
    <html>

    <?php
    $pokedex = new DomDocument();
    $pokedex->load('pokedex.xml');
    $pokemons = $pokedex->getElementsByTagName("pokemon");
    ?>

        <head>
            <title>Pokedex - LP40</title>
            <link rel="stylesheet" href="css/normalize.css" />
            <link rel="stylesheet" href="css/style.css" />
            <script>// Ajax informations
            function validate(id) {
                console.log('fion');
                var http = new XMLHttpRequest();
                var url = "pokemon.php";
                var params = "id="+id;
                http.open("POST", url, true);
     
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http.setRequestHeader("Content-length", params.length);
                http.setRequestHeader("Connection", "close");
                
                http.onreadystatechange = function() {
                    if(http.readyState == 4 && http.status == 200) {
                        
                        var node = document.getElementById('infos');
                        while (node.hasChildNodes()) {
                            node.removeChild(node.firstChild);
                        }
                        
                        var text = http.responseText;
                        var infos = document.getElementById('infos');
                        var div = document.createElement('div');
                        div.innerHTML = text ;
                        
                        infos.appendChild(div);
                        console.log(text);
                    }
                }
                http.send(params);
            }
    </script>
        </head>
        <body>
            <h1 id='title'><img src="img/pokeball.png" alt="pokeball"/>Pokédex</h1>
            <div class="clear"></div>
            <div class="interface box row">
                <div class="list box">
                    <?php
                        foreach ($pokemons as $pokemon) {
                            echo "<form id='click' action='pokemon.php' method='POST' onsubmit=\"event.preventDefault(); return validate(".$pokemon->getAttribute("id").");\">";
                            echo "<span id='index'>".$pokemon->getAttribute("id")." : </span>";
                            echo "<input type='submit'  value='".$pokemon->getElementsByTagName("nom")->item(0)->nodeValue."'/>";
                            echo "<img src='https://www.pokebip.com/pokedex/images/sugimori/".(int)$pokemon->getAttribute("id").".png' class='imageGauche' alt='Bulbizarre' />";
                            echo "</form>";
                        }
                    ?>
                    <ul class="list_pokemon">
                        <li class="pokemon_display_name"><span class="number"></span><a></a></li>
                    </ul>
                    <div class="scroller">
                        <div id="indicator"></div>
                    </div>
                </div>
                <div class="infos box" id="infos">
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
