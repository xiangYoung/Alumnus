$(document).ready(function(){

    /*  Testimonials Slider  */
	$('#tslider').carouFredSel({
            circular : true,
            infinite: false,
            responsive : true,
            scroll : {
                items : 1,
                fx : "fade"
            },
            pagination: {
				container:	"#t_navigation",
				anchorBuilder:	function(nr){
					return '<a href="#'+nr+'"></a>';
				}
			}
    });

});



