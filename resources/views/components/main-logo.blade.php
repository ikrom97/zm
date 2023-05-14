@props(['class' => null])

@php
  $className = $class ? "$class main-navigation" : 'main-navigation';
@endphp

<a
  class="main-logo"
  href="{{ route('home') }}"
>
  <img
    src="{{ asset('images/logo.svg') }}"
    width="192"
    height="40"
    alt="@lang('logoAlt')"
    loading="lazy"
  >
</a>
