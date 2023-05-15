import axios from 'axios';
import { debounce } from '../util.js';

document.addEventListener('click', (evt) => {
  if (evt.target.closest('.main-navigation__link--search')) {
    document.body.classList.add('search-modal-shown');
  }
  if (evt.target.closest('.search-modal') && !evt.target.closest('.search-modal__form')) {
    document.body.classList.remove('search-modal-shown');
  }
});

document.querySelector('#search-keyword')
  .addEventListener('input', debounce(async (evt) => {
    axios
      .get(`${evt.target.closest('form').action}?keyword=${evt.target.value}`)
      .then(({ data }) => {
        document.querySelector('.search-modal__results')
          .innerHTML = data;
      })
      .catch((error) => console.error(error));
  }));
