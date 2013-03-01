$(function(){
	load_page("home");
});

function load_page(page){
	$.get("./page/"+page+".php",function(r){
		$("#contenttext").html(r);
	});
}

function otpissue(){
	alert(1);
}
