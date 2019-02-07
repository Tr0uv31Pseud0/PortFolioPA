import config from '../app/config.js';

export default class EventModel{
    listAll(q = '', dateStart = new Date().getFullYear(), sortBy = '') {

        return fetch(`${config.openDataURL}?dataset=evenements-a-paris&sort=${sortBy}&refine.date_start=${dateStart}&q=${encodeURIComponent(q)}`)
                    .then(response => response.json()) // Transforme la réponse au format JSON ...
                    .then(openData => {

                        let events = openData.records
                                        .map(record => record.fields) // Dans le set de données récupérées, ne nous intéressent que la clé "fields" qui est un Object
                                        .map(field => {
                                            // Dans chaque objet "field", on ne choisit finalement que de prendre le titre et l'image,
                                            // Donc on renvoie un nouvel objet litéral avec seulement 2 clés "title" et "image"
                                            return {
                                                title : field.title ? field.title.replace('&amp;', '&') : 'Événement sans titre',
                                                image : field.image || 'static/images/subtle-grey.png'
                                            }
                                        });

                        return events;
                    })
                    .catch(err => alert(err.message || err));
    }
}