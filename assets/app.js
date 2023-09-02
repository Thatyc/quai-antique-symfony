/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// You can specify which plugins you need
import { Tooltip, Toast, Popover } from 'bootstrap';

// start the Stimulus application
import './bootstrap';
// public/assets/js/disable-mondays.js

document.addEventListener('DOMContentLoaded', function () {
    // Sélectionnez le formulaire par sa classe CSS
    var reservationForm = document.querySelector('.reservation-form');

    if (reservationForm) {
        // Événement de soumission du formulaire
        reservationForm.addEventListener('submit', function (e) {
            // Sélectionnez la date du champ
            var dateField = document.getElementById('date-field');
            var selectedDate = new Date(dateField.value);

            // Vérifiez si la date sélectionnée est un lundi (jour de la semaine 1)
            if (selectedDate.getDay() === 1) {
                // Empêchez l'envoi du formulaire
                e.preventDefault();

                // Affichez le message d'erreur dans une fenêtre pop-up
                var errorMessage = 'Les réservations ne sont pas autorisées les lundis.';
                
            }
        });
    }
});





