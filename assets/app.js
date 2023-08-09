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

// Obtenez le nombre de places disponibles depuis une source de données (par exemple, une API)
function obtenirPlacesDisponibles() {
  // Ici, vous pouvez effectuer une requête AJAX ou tout autre moyen pour obtenir les données
  // Dans cet exemple, nous allons simplement générer un nombre aléatoire entre 1 et 100
  return Math.floor(Math.random() * 100) + 1;
}

// Mettez à jour le contenu du panel avec le nombre de places disponibles
function mettreAJourPanel() {
  var panel = document.getElementById("placesPanel");
  var placesDisponibles = obtenirPlacesDisponibles();

  panel.innerHTML = "Places disponibles : " + placesDisponibles;
}

// Appel initial pour mettre à jour le panel au chargement de la page
mettreAJourPanel();

// Vous pouvez également mettre à jour le panel à intervalles réguliers en utilisant setInterval
// Par exemple, pour mettre à jour toutes les 5 secondes :
// setInterval(mettreAJourPanel, 5000);
  

