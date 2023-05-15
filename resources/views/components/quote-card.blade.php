@props([
    'class' => null,
    'selectedTag' => null,
    'quote',
])

@php
  $className = $class ? "$class quote-card" : 'quote-card';
@endphp

<blockquote class="{{ $className }} tags-hidden">
  <a
    class="quote-card__link"
    href="{{ route('quotes.selected', $quote->slug) }}"
  >
    #{{ $quote->slug }}
  </a>

  <div class="quote-card__top">
    <q class="quote-card__quote">{{ $quote->quote }}</q>

    <div class="quote-card__tags">
      @if ($selectedTag)
        <a class="quote-card__tag quote-card__tag--current">
          <svg
            width="6"
            height="10"
          >
            <use xlink:href="{{ asset('images/stack.svg') }}#triangle" />
          </svg>
          {{ $selectedTag->title }}
        </a>
      @endif
      @foreach ($quote->tags as $tag)
        @if ($tag != $selectedTag)
          <a
            class="quote-card__tag"
            href="{{ route('tags.selected', $tag->slug) }}"
          >
            <svg
              width="6"
              height="10"
            >
              <use xlink:href="{{ asset('images/stack.svg') }}#triangle" />
            </svg>
            {{ $tag->title }}
          </a>
        @endif
      @endforeach
    </div>
  </div>

  <footer class="quote-card__bottom">
    @if (count($quote->tags) - 2 != 0)
      <button
        class="quote-card__button"
        type="button"
        aria-label="Показать/скрыть теги"
        data-show-text="Ещё {{ count($quote->tags) - 2 }} тегов"
        data-hide-text="Скрыть теги"
      ></button>
    @endif

    <div class="quote-card__share">
      <div class="quote-card__share-links">
        <a
          class="quote-card__share-link"
          title="Фейсбук"
        >
          <svg
            width="16"
            height="16"
          >
            <use xlink:href="{{ asset('images/stack.svg') }}#facebook" />
          </svg>
        </a>
        <a
          class="quote-card__share-link"
          title="Инстаграм"
        >
          <svg
            width="12"
            height="12"
          >
            <use xlink:href="{{ asset('images/stack.svg') }}#instagram" />
          </svg>
        </a>
        <a
          class="quote-card__share-link"
          title="Твиттер"
        >
          <svg
            width="12"
            height="10"
          >
            <use xlink:href="{{ asset('images/stack.svg') }}#twitter" />
          </svg>
        </a>
        <a
          class="quote-card__share-link"
          title="Телеграм"
        >
          <svg
            width="16"
            height="16"
          >
            <use xlink:href="{{ asset('images/stack.svg') }}#telegram" />
          </svg>
        </a>
        <button
          class="quote-card__share-link"
          type="button"
          aria-label="Скопировать"
        >
          <svg
            width="12"
            height="12"
          >
            <use xlink:href="{{ asset('images/stack.svg') }}#copy" />
          </svg>
        </button>
      </div>

      <button
        class="quote-card__share-button"
        type="button"
        aria-label="Поделиться"
      >
        <svg
          width="16"
          height="18"
        >
          <use xlink:href="{{ asset('images/stack.svg') }}#share" />
        </svg>
      </button>
    </div>
  </footer>
</blockquote>
