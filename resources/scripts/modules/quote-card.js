document.addEventListener('click', (evt) => {
  if (evt.target.closest('.quote-card__button')) {
    evt.target.closest('.quote-card').classList.toggle('tags-hidden');
  }
  if (evt.target.closest('[aria-label="Скопировать"]')) {
    const quote = evt.target.closest('blockquote').querySelector('q').textContent;
    navigator.clipboard.writeText(quote)
      .then(() => console.log('Text copied to clipboard'))
      .catch((err) => console.error('Error in copying text: ', err));
  }
});
