    // Ajax informations
    var click = document.getElementById('.click');
    click.addEventListener('onsubmit', function(event) {
                event.preventDefault();
                var http = new XMLHttpRequest();
                var url = "pokemon.php";
                var parent = this.parentElement;
                var id = parent.children[2].getAttribute("name"); 
                var params = "id="+id;
                http.open("POST", url, true);
     
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http.setRequestHeader("Content-length", params.length);
                http.setRequestHeader("Connection", "close");
                
                http.onreadystatechange = function() {
                    if(http.readyState == 4 && http.status == 200) {
                        alert(http.responseText);
                    }
                }
                http.send(params);
        });