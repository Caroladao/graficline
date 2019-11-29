$(document).ready(function() {

});


function link(x,y){
	cordenadas = $("section#" + x).offset();
	$("body,html,section").animate({
		scrollTop:cordenadas.top
	},y)
}
function FormJ(){
$(".fisico").css({
"display":"none"
});

$(".juridico").css({
	"display":"block"
});
$("#formf").css({
	"color":"grey"
});
$("#formj").css({
	"color":"black"
});
}

function FormF(){
$(".fisico").css({
"display":"block",
"transition":"10s"
});

$(".juridico").css({
"display":"none"
});
$("#formj").css({
	"color":"grey"
});
$("#formf").css({
	"color":"black"
});
}





$(window).scroll(function(){
	distanciaTopo = $(window).scrollTop();
	console.log(distanciaTopo);


})



