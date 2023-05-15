@extends('layouts.app')

@section('links')
  <link
    rel="stylesheet"
    href="{{ asset('css/pages/quotes/selected.min.css') }}"
  >
@endsection

@section('content')
  <main class="quote-selected container">
    <h1 class="visually-hidden">Из философского творчества</h1>

    <x-quote-card
      class="quote-selected__quote"
      :quote="$data->quote"
    />

    <aside class="tags">
      <h2 class="tags__title title">
        <button
          class="tags__button"
          type="button"
        >
          Теги
          <svg
            class="tags__button-icon"
            width="9"
            height="12"
          >
            <use xlink:href="{{ asset('images/stack.svg') }}#arrow" />
          </svg>
        </button>
      </h2>

      <ul class="tags__list">
        @foreach ($data->tags as $tag)
          <li class="tags__item">
            <a
              class="tags__link"
              href="{{ route('tags.selected', $tag->slug) }}"
            >
              {{ $tag->title }}
            </a>
          </li>
        @endforeach
      </ul>
    </aside>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/pages/quotes/selected.min.js') }}" type="module"></script>
@endsection
