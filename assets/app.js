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

import $ from 'jquery';


// start the Stimulus application
import './bootstrap';
// public/assets/js/disable-mondays.js





/// Récupérez toutes les images de la galerie
const images = document.querySelectorAll('.img-gallery');

// Récupérez la boîte modale
const modal = document.getElementById('myModal');

// Récupérez l'élément d'image de la boîte modale
const modalImage = document.getElementById('modalImage');

// Parcourez chaque image de la galerie
images.forEach(image => {
  // Ajoutez un écouteur d'événements au clic sur chaque image
  image.addEventListener('click', () => {
    // Affichez la boîte modale
    modal.style.display = 'block';

    // Affichez l'image agrandie dans la boîte modale
    modalImage.src = image.getAttribute('data-src');

    modalImage.classList.add('modal-image');

  });
});

// Récupérez l'élément de fermeture de la boîte modale
const closeModal = document.querySelector('.close');

// Ajoutez un écouteur d'événements au clic sur l'élément de fermeture
closeModal.addEventListener('click', () => {
  // Fermez la boîte modale
  modal.style.display = 'none';
});

// Ajoutez un écouteur d'événements pour fermer la boîte modale en cliquant en dehors de l'image
window.addEventListener('click', event => {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});



















