@extends('layouts.app')

@section('links')
  <link
    rel="stylesheet"
    href="{{ asset('css/pages/author/index.min.css') }}"
  >
@endsection

@section('content')
  <main class="author-page container">
    <div class="author-page__author">
      <img
        class="author-page__image"
        src="{{ asset('images/author.jpg') }}"
        width="419"
        height="421"
        alt="Зафар Мирзо"
        loading="lazy"
      >
      <q class="author-page__quote">Цель высока, когда любовь обширна</q>
    </div>

    <h1 class="author-page__title">
      Авторский сайт <br>
      Зафар Мирзо
    </h1>

    <div class="author-page__info">
      <p class="author-page__info-item">Социальный предприниматель и председатель. Также занимаюсь философским творчеством.</p>
      <p class="author-page__info-item">1 Мая 1972</p>
      <p class="author-page__info-item">
        Из моего собственного философского творчества
        <a class="button" href="{{ route('home') }}">Мысли</a>
      </p>
    </div>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/pages/author/index.min.js') }}" type="module"></script>
@endsection
