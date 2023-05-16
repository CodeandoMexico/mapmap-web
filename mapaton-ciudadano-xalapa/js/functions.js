//Promocion Emergente
$(document).ready( function(){
    var jRes = jRespond([
    {
        label: 'less_768',
        enter: 0,
        exit: 767
    },{
        label: 'more_769',
        enter: 769,
        exit: 10000
    }]);

    jRes.addFunc([{
            breakpoint: 'less_768',
            enter: function() {
        	},
            exit: function(){}
        },{
        breakpoint: 'more_769',
        enter: function() {
            $( ".dinamica-hover" ).hover(
                function() {
                    $('.dinamica-hover').css({"background-position" : "0 -152px"});
                    $('.dinamica-hover .bg-btn-ly-2').css({"background-color" : "#C67C02"});
                }, function() {
                    $('.dinamica-hover').css({"background-position" : "top"});
                    $('.dinamica-hover .bg-btn-ly-2').css({"background-color" : "#007C6A"});
                }
            );
            $( ".bases-hover" ).hover(
                function() {
                    $('.bases-hover').css({"background-position": "0 -150px"});
                    $('.bases-hover .bg-btn-ly-2').css({"background-color" : "#C67C02"});
                }, function() {
                    $('.bases-hover').css({"background-position" : "top"});
                    $('.bases-hover .bg-btn-ly-2').css({"background-color" : "#007C6A"});
                }
            );
             $( ".reglas-hover" ).hover(
                function() {
                    $('.reglas-hover').css({"background-position": "0 -150px"});
                    $('.reglas-hover .bg-btn-ly-2').css({"background-color" : "#C67C02"});
                }, function() {
                    $('.reglas-hover').css({"background-position" : "top"});
                    $('.reglas-hover .bg-btn-ly-2').css({"background-color" : "#007C6A"});
                }
            );
    	},
        exit: function() {}
    }]);
});
