
$(document).ready(function(){
	 var keys     = [];
    var konami  = '13';
	//alert(konami);
	//alert("Here");
	$(document).keydown(function(e){
		keys.push(e.keyCode);
		if(keys.toString().indexOf(konami)>=0){
			$(".konami").hide().fadeIn("slow").html('Maachuda Ankit');
			keys=[];
			$(".konami").fadeOut(10000);
		}
	});
})
