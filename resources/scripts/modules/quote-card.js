document.addEventListener('click', (evt) => {
  if (evt.target.closest('.quote-card__button')) {
    evt.target.closest('.quote-card').classList.toggle('tags-hidden');
  }
});
