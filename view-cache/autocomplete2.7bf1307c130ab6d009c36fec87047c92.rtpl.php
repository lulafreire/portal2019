<?php if(!class_exists('Rain\Tpl')){exit;}?><link rel="stylesheet" href="css/style-jquery.css">

<script>
    $(document).ready(function(){
        $("#searchInput").autocomplete({
            source: "http://127.0.0.1/portalaps/getusers.php",
            minLength: 1,
            select: function(event, ui) {
                $("#searchInput").val(ui.item.value);
                $("#userID").val(ui.item.id);
            }
        }).data("ui-autocomplete")._renderItem = function( ul, item ) {
        return $( "<li class='ui-autocomplete-row'></li>" )
            .data( "item.autocomplete", item )
            .append( item.label )
            .appendTo( ul );
        };
    });
    </script>


<!-- Autocomplete input field -->
<input id="searchInput" placeholder="Enter member name..." autocomplete="off">

<!-- Hidden input for user ID -->  
<input type="hidden" id="userID" name="userID" value=""/>