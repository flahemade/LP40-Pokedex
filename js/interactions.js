    // Ajax informations
    $(document).ready(function(){
       $('.list form').submit(function(event){
        event.preventDefault();
          var $form = $( this ),
            id = $form.find( "input[name='id']" ).val(),
            url = $form.attr('action');
            console.log(url+" : "+id);
            var posting = $.post( url, { id: id } );
            
              posting.done(function( data ) {
                var content = data;
                $( ".infos" ).empty().append( content );
                console.log(content);
              });
       });
    });