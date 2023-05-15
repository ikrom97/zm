@props(['class' => null])

@php
  $className = $class ? "$class search-modal" : 'search-modal';
@endphp

<dialog class="{{ $className }}">
  <h2 class="search-modal__title title">Поиск по сайту</h2>

  <form
    class="search-modal__form"
    action="{{ route('quotes.search') }}"
    method="get"
    onsubmit="return false"
  >
    <label
      class="visually-hidden"
      for="search-keyword"
    >
      Поиск по сайту
    </label>
    <input
      class="search-modal__input"
      id="search-keyword"
      type="search"
      placeholder="Введите ключевое слово"
      autocomplete="off"
    >
    <div class="search-modal__results"></div>
  </form>


  <button
    class="search-modal__close"
    type="button"
    aria-label="Закрыть окно"
  >
    <svg
      width="18"
      height="15"
    >
      <use xlink:href="{{ asset('images/stack.svg') }}#close" />
    </svg>
  </button>
</dialog>
