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


// Galerie photo
const images = document.querySelectorAll('.img-gallery');

const modal = document.getElementById('myModal');

const modalImage = document.getElementById('modalImage');

// Parcourir chaque image de la galerie
images.forEach(image => {
image.addEventListener('click', () => {
modal.style.display = 'block';

modalImage.src = image.getAttribute('data-src');

modalImage.classList.add('modal-image');

});
});

window.addEventListener('click', event => {
if (event.target === modal) {
modal.style.display = 'none';
}
});






















