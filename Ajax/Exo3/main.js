'Use Strict'

//  VARIABLES //

var productName;
var input = $('input[type="text"]')[0];
var result = [];


// FONCTIONS //

function onClickSearch(e) {
   e.preventDefault();
   search();
}

function search() {
   $.getJSON('datas.php', function(data) {
       $('tbody').empty();
       for(let i = 0; i < data.length; i++) {
           productName = data[i].productName.split(' ');     
           for (let j = 0; j < productName.length; j++) {
               productName[j] = productName[j].split('');
               var n = input.value.length;
               var rest = productName[j].splice(input.value.split(''), n);
               if (input.value.toLowerCase() == rest.join('').toLowerCase()) {
                   if(result[result.length -1] != data[i].productName) {
                    result.push(data[i].productName);
                    $('tbody').append('<tr><td>' + data[i].productName + '</td><td>' + data[i].productLine + '</td><td>' + data[i].productDescription + '</td></tr>');
                   }
               }
           }
       }
   });
}

//  CODE //

$('input[type = "text"]').on('keyup',onClickSearch);