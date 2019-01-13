<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Les films</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script
	src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>

</head>
<body>
<h1><i class="fas fa-flask"></i> Exercice Ajax</h1>
<form method="post">
    <fieldset>
        <section id="again">
        </section>
        <article id="woup"></article>
    </fieldset>
    <fieldset class="block">
    <legend><i class="fas fa-question-circle"></i> Votre choix</legend>
    <ul>
        <li>
            <input type="radio" name="choice" value="html" id="html">
            <label for="html">Récupérer du contenu HTML</label>
        </li>
        <li>    
            <input type="radio" name="choice" value="json" id="json">
            <label for="json">Récupérer du contenu JSON</label>
        </li>       
            <input type="radio" name="choice" value="film" id="film">
            <label for="film">Récupérer les films</label>
        <li>    
            <button>Executer</button>
        </li>    
    </ul>
    </fieldset>
<script type="text/javascript" src="main.js"></script>
</body>
</html>
