$(function(){
	
	$(".social").toggle(function(){
		var me = $(this);
		me.flip({
			direction:'lr',
			speed: 300,
			color:'#505050',
			onEnd: function(){
				me.find("img").toggle();
				me.find(".desc").toggle();
			}
		});
	},function(){
		var me = $(this);
		me.flip({
			direction:'rl',
			speed: 300,
			color:'#303030',
			onEnd: function(){
				me.find("img").toggle();
				me.find(".desc").toggle();
			}
		});
	});
	
});