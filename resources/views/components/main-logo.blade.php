@props(['class' => null])

@php
  $className = $class ? "$class main-navigation" : 'main-navigation';
@endphp

<a
  class="main-logo"
  @if (request()->route()->getName() != 'home') href="{{ route('home') }}" @endif
>
  <img
    src="{{ asset('images/logo.svg') }}"
    width="192"
    height="40"
    alt="На главную"
    loading="lazy"
  >
</a>
