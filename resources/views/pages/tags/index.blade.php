@extends('layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ asset('css/pages/tags/index.min.css') }}">
@endsection

@section('content')
  <main class="tags-page container">
    <div class="tags-page__right">
      <h1 class="tags-page__title title">Теги</h1>

      <ul class="tags-page__list">
        @foreach ($data->tags as $tag)
          <li class="tags-page__list-item">
            <a class="tags-page__list-link" href="{{ route('tags.selected', $tag->slug) }}">
              {{ $tag->title }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>

    <aside class="posts">
      <h2 class="visually-hidden">Картинки</h2>

      <ul class="posts__list">
        @foreach ($data->posts as $post)
          <li class="posts__item">
            <x-post-card :post="$post" />
          </li>
        @endforeach
      </ul>
    </aside>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/pages/tags/index.min.js') }}" type="module"></script>
@endsection
