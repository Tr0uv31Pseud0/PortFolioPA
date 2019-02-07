import app from '../app/app.js';
import EventModel from '../models/EventModel.js';

export default class Search {
    constructor() {
        this.url = 'views/search.html';
    }

    executeHttpRequest() {
        // Écrire le gestionnaire d'événements qui écoute la soumission du formulaire ...
        document.getElementById('formSearch').addEventListener('submit', event => {
            event.preventDefault(); // Empêche la validation du formulaire par le navigateur

            let params = app.dom.getFormFieldsValues('q', 'sortBy', 'dateStart');

            console.log('params = ', params);

            this.search(params);
            /*
                params = {
                    q : "danse",
                    dateStart : "2017",
                    sortBy : "-date_start",
                }
            */

            /*
                MODEL -> va communiquer avec l'API OpenAgenda de Paris
                VIEW -> le html
                CONTROLLER -> ce fichier
            */
        });
    }

    search(params = {}) {
        let eventModel = new EventModel();

        eventModel
            .listAll(params.q, params.dateStart, params.sortBy)
            .then(events => {
                console.log('Les événements récupérés sont', events);

                app.dom.renderTemplateCopies('#event-template', '.event-list', events, (copy, event) => {
                    copy.querySelector('.event-image').src = event.image
                    copy.querySelector('.event-title').textContent = event.title
                });
            })
    }
} // FIn de la classe
