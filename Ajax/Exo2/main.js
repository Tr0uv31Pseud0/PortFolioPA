'Use Strict'

var section = document.querySelector('#again');


function getHTML() {
	$.get("data-html.php", function( data ){
		$('section').html(data);
	});
}

function getJSON() {
        $.getJSON("data-json.php", function(data){
            section.innerHTML="";
            // on pouvait aussi utiliser .empty()
            // on pouvait l'écrire sur une meme phrase ($('.result').empty().append(data);)
            $('section').append("<ul id='woup'>");
            for (let i = 0; i < data.length ; i++) {
                $('#woup').append("<li>" + "<h2>" + data[i].nom + "</h2>" + "<p>" + data[i].phone + "</p>" + "</li>");
                console.log(data[i]);
            }
        });
}
function getMovies() {
    $.get("data-film.php", function( data ){
		$('section').html(data);
	});
}

function onClickExecute(e) {
    e.preventDefault();
    switch(document.querySelector('input[name="choice"]:checked').value){
        case 'html':
        getHTML();
        break;
        case 'json':
        getJSON();
        break;
        case 'film':
        getMovies();
        break;
    }
}

$("button").on('click',onClickExecute);

