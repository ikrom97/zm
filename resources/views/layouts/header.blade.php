<header class="page-header">
  <div class="page-header__container container">
    <x-main-logo />

    <x-main-navigation />
  </div>

  <template id="menu-toggler">
    <button class="page-header__button" type="button" aria-label="Переключить меню">
      <svg width="18" height="12">
        <use xlink:href="{{ asset('images/stack.svg') }}#menu" />
      </svg>
    </button>
  </template>
</header>
