@extends('layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ asset('css/pages/tags/selected.min.css') }}">
@endsection

@section('content')
  <main class="page-main"></main>
@endsection

@section('scripts')
  <script src="{{ asset('js/pages/tags/selected.min.js') }}" type="module"></script>
@endsection
