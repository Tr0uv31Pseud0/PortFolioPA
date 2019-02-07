import app from './app.js';
import config from './config.js';
import Home from '../controllers/Home.js';
import About from '../controllers/About.js';
import Search from '../controllers/Search.js';
import Login from '../controllers/Login.js';

// --------------------------------------------------------------------------------------------------------------------
// INITIALISATION DE L'APPLICATION
// --------------------------------------------------------------------------------------------------------------------

function initializeRouter() {
    // Instancier ici le Vanilla Router dans l'objet "app.mvc.router"
    // ...
    app.mvc.router = new Router({
        mode: 'hash',
        root: '/index.html'
    })

    //Definition des différentes routes disponibles
    app.mvc.router.add('/', () => app.mvc.dispatchRoute(new Home()));
    app.mvc.router.add('/about', () => app.mvc.dispatchRoute(new About()));
    app.mvc.router.add('/search', () => app.mvc.dispatchRoute(new Search()));
    app.mvc.router.add('/login', () => app.mvc.dispatchRoute(new Login()));

    // Synchronisation puis activation du routeur (c.f documentation de vanilla router)
    app.mvc.router.check().addUriListener();
}


// --------------------------------------------------------------------------------------------------------------------
// CODE PRINCIPAL
// --------------------------------------------------------------------------------------------------------------------

document.addEventListener('DOMContentLoaded', function () {
    // Initialisation du routeur.
    initializeRouter();

    // initialisation de la database Firebase
    firebase.initializeApp(config.firebase);

    // Initialisation du service worker


	// Initialisation du service worker 
    if (navigator.serviceWorker !== undefined) {
        navigator.serviceWorker.register('../service-worker.js').then(() => console.log('Service Worker Enregistré'));

        let deferredPrompt;

        window.addEventListener('beforeinstallprompt', (e) => {
            // Prevent Chrome 67 and earlier from automatically showing the prompt
            e.preventDefault();
            // Stash the event so it can be triggered later.
            deferredPrompt = e;
            // Affichage du bouton
            document.getElementById('btnAdd').style.display = 'inline-block';
        });

        document.getElementById('btnAdd').addEventListener('click', (e) => {
            // Show the prompt
            deferredPrompt.prompt();
        });
    }
      
    

});