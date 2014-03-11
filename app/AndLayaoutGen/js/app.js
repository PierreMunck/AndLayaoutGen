$(document).ready(function(){
    
    var toolsOpen = false;
    var optionsOpen = false;

    $('#tools-opener').css("margin", "-"+$('#tools').height()/2+ "px -5% 0 0");
    $('#options-opener').css("margin", "-"+$('#options').height()/2 + "px  0 0 -5%");
    
    $('#tools-opener').click(
        function() {
            if(!toolsOpen){
                $('#tools').css("margin","0 0 0 0");
                $('#tools').children('.tools-opener').children('.arrow-right').attr('class','arrow-left');
                $('#tools').children('.tools-opener').css("margin","-"+$('#tools').height()/2+ "px 0 0 0 ");
                $('#options').css("margin","0 -50% 0 0");
                $('#navegador').css("margin","0 -25% 0 0");
                toolsOpen = true;
            }else{
                $('#tools').css("margin","0 0 0 -25%");
                $('#tools').children('.tools-opener').children('.arrow-left').attr('class','arrow-right');
                $('#tools').children('.tools-opener').css("margin","-"+$('#tools').height()/2+ "px -5% 0 0 ");
                $('#options').css("margin","0 -25% 0 0");
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
                $('#options').children('.options-opener').children('.arrow-left').attr('class','arrow-right');
                $('#options').children('.options-opener').css("margin","-"+$('#options').height()/2 + "px 0 0 0 ");
                $('#navegador').css("margin","0 0 0 0");
                optionsOpen = true;
            }else{
                $('#tools').css("margin","0 0 0 -25%");
                $('#options').css("margin","0 -25% 0 0");
                $('#options').children('.options-opener').children('.arrow-right').attr('class','arrow-left');
                $('#options').children('.options-opener').css("margin","-"+$('#options').height()/2 + "px 0 0 -5% ");
                $('#navegador').css("margin","0 0 0 0");
                optionsOpen = false;
            }
        }
    );
});
    