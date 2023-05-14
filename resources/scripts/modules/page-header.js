if (window.screen.width < 768) {
  const navigation = document.querySelector('.main-navigation');
  const button = document.querySelector('#menu-toggler').content.cloneNode(true).children[0];

  navigation.insertAdjacentElement('beforebegin', button);
  document.body.classList.add('menu-hidden');

  button.addEventListener('click', () => {
    if (document.body.classList.contains('menu-hidden')) {
      document.body.classList.remove('menu-hidden');
      button.innerHTML = `
        <svg width="18" height="15">
          <use xlink:href="/images/stack.svg#close" />
        </svg>
      `;
      return;
    }
    document.body.classList.add('menu-hidden');
    button.innerHTML = `
      <svg width="18" height="12">
        <use xlink:href="/images/stack.svg#menu" />
      </svg>
    `;
  });
}
