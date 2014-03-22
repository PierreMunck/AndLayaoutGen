$(document).ready(function(){
    
    var toolsOpen = false;
    var optionsOpen = false;
    
    
    //$('#tools').css("height", Math.round($('.app-content').height())+ "px");
    //$('#options').css("height", Math.round($('.app-content').height())+ "px");
    
    $('#tools-opener').click(
        function() {
            if(!toolsOpen){
                $('#tools').css("margin","0 0 0 0");
                $('#options').css("margin","0 -50% 0 0");
                $('#navegador').css("margin","0 -25% 0 0");
                toolsOpen = true;
            }else{
                $('#tools').css("margin","0 0 0 -24%");
                $('#options').css("margin","0 -24% 0 0");
                $('#navegador').css("margin","0 0 0 0");
                toolsOpen = false;
            }
        }
    );
    
    $('#options-opener').click(
        function() {
            if(!optionsOpen){
                $('#tools').css("margin","0 0 0 -50%");
                $('#options').css("margin","0 0 0 0");
                $('#navegador').css("margin","0 0 0 0");
                optionsOpen = true;
            }else{
                $('#tools').css("margin","0 0 0 -24%");
                $('#options').css("margin","0 -24% 0 0");
                $('#navegador').css("margin","0 0 0 0");
                optionsOpen = false;
            }
        }
    );
    
    $('#button-ajax').click(
        function() {
            alert('click');
            jQuery.post( '/core/Ajax.php',
                { action :'test' },
                function(data) {
                    alert(data);
                }
            );
        }
    );
});
    