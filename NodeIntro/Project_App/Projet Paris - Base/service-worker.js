const cachedFiles = [
	'/',
    'index.html',
    'app/app.js',
    'app/config.js',
    'app/main.js',
    'controllers/About.js',
    'controllers/Home.js',
    'controllers/Login.js',
    'controllers/Search.js',
    'models/EventModel.js',
    'static/css/main.css',
    'static/images/subtle-grey.png',
    'views/about.html',
    'views/home.html',
    'views/login.html',
    'views/search.html',
    'node_modules/vanilla-router/dist/vanilla-router.js',
];

const cachedLibs = [
    'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css',
    'https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.min.css',
    'https://www.gstatic.com/firebasejs/5.8.2/firebase-app.js',
    'https://www.gstatic.com/firebasejs/5.8.2/firebase-auth.js',
    'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js',
];


self.addEventListener('install', (event) => {
    /* ... */
    console.log('[SW] Installation ...');
    
    event.waitUntil(
        caches.open('events-cache-static').then(cache => {
            return cache.addAll(cachedFiles)
                        .then(() => Promise.all(cachedLibs.map(libUrl => {
                            const req = new Request(libUrl, { mode: 'no-cors' });
                            fetch(req).then(res => cache.put(req, res));
                        })))
                        .then(() => self.skipWaiting())
        })
    );
});



self.addEventListener('install', (event) => {
    /* ... */
});

self.addEventListener('activate', (event) => {
    /* ... */
});

self.addEventListener('fetch', (event) => {
   /*
    
        // Interception de chaque requete réseau
        console.log('Interception d\'une requête : ', event.request.url);

        // Si l'URL interceptée se termine par ".jpg" et que ce n'est pas l'image du chat ...
        if (event.request.url.endsWith('.jpg') && !event.request.url.endsWith('cat.jpg')) {

            // ... alors on fait répondre notre Service Worker avec une requête vers l'image du chat
            event.respondWith(
                fetch('./static/images/cat.jpg')
            );
        }
    
    */
});