$("button").on('click',function(  ){
	$.get("data.php", function( data ){
		var p = document.querySelector('#p');
		p.append( data );
	});
});

