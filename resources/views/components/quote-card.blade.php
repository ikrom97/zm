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
    #{{ str_pad($quote->slug, 4, '0', STR_PAD_LEFT) }}
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
    @if (count($quote->tags) - 3 > 0)
      <button
        class="quote-card__button"
        type="button"
        aria-label="Показать/скрыть теги"
        data-show-text="Ещё теги"
        data-hide-text="Скрыть теги"
      ></button>
    @endif

    <div class="quote-card__share">
      <div class="quote-card__share-links">
        <a
          class="quote-card__share-link"
          title="Фейсбук"
          href="https://www.facebook.com/sharer/sharer.php?u={{ route('quotes.selected', $quote->slug) }}"
          target="_blank"
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
          title="Твиттер"
          href="https://twitter.com/intent/tweet?url={{ route('quotes.selected', $quote->slug) }}"
          target="_blank"
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
          href="https://telegram.me/share/url?url={{ route('quotes.selected', $quote->slug) }}"
          target="_blank"
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
