let app = {
    // ----------------------------------------------------------------------------------------------------------------
    // MANIPULATION DU DOM DE L'APPLICATION
    // ----------------------------------------------------------------------------------------------------------------
    dom: {
        getFormFieldsValues(...formFields) {
            let values = {};

            formFields.forEach(field => {
                values[field] = document.getElementById(field).value;
            });
            return values;
        },

        emptyNode: function (node) {
            while (node.firstChild) {
                node.removeChild(node.firstChild);
            }
        },
        // emptyNode permet par exemple, lorsqu'on veut refaire une recherche d'enlever la recherche précédente pour laisser la place a la nouvelle 

        renderTemplateCopies(templateSelector, targetSelector, values, copyInitCallBack) {
            // Recherche l'élément cible dans l'arbre DOM.
            let target = document.querySelector(targetSelector);

            // Recherche le template dans l'arbre DOM.
            let template = document.querySelector(templateSelector);

            // Création d'un fragment de DOM vide.
            let fragment = document.createDocumentFragment();

            for (let value of values) {
                // Création d'une copie du template dans l'arbre DOM.
                let copy = document.importNode(template.content, true);

                // Exécution du callback d'initialisation de la copie du template.
                copyInitCallBack(copy, value);

                // Insertion de la copie du template dans le fragment de DOM (mieux pour les performances durant la boucle)
                fragment.appendChild(copy);
            }

            // Fin de boucle : Insertion du fragment dans l'élément cible dans l'arbre DOM.
            this.emptyNode(target);
            target.appendChild(fragment);
        }

    },


    // ----------------------------------------------------------------------------------------------------------------
    // ARCHITECTURE MVC DE L'APPLICATION
    // ----------------------------------------------------------------------------------------------------------------
    mvc: {
        // instance de la classe Routeur de la librairie vanilla-router
        router: null,

        dispatchRoute(controllerInstance) {
            // Vérifie que le controlleur est un controlleur valide
            if (!controllerInstance.hasOwnProperty('url') || !controllerInstance.executeHttpRequest) {
                return console.warn(`Le controller ${controllerInstance.constructor.name} est invalide.`)
            }


            // Exécute une requête HTTP GET pour récupérer la vue, et définir la chaîne de promesses
            fetch(controllerInstance.url)
                .then(response => response.text())
                .then(htmlContent => {
                    document.querySelector('main').innerHTML = htmlContent;

                    controllerInstance.executeHttpRequest();
                });
        }
    }

};


    // L'application est exportée afin d'être accessible par d'autres modules.
    export default app;