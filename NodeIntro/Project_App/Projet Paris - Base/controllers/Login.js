export default class Login {
    constructor() {
        this.url = 'views/Login.html';
    }

    executeHttpRequest() {
        // Le code à exécuter lorsqu'on est sur l'accueil !
        console.log("Hey! Bienvenue sur le Login !");

        document.querySelector('#githubLogin').addEventListener('click', event => {
            event.preventDefault();

            let provider = new firebase.auth.GithubAuthProvider();

            firebase.auth().signInWithPopup(provider).then(result => {

                const {displayName, photoURL} = result.user;

                console.log(`Super ! Bienvenue à toi ${displayName} ! `, photoURL )

                document.querySelector('.nav-item:last-child').innerHTML = `Bienvenue  <strong>${displayName}</strong> !
                <img src="${photoURL}" alt="${displayName}" class="img-thumbnail">`;
            })
        })
    }
}