@extends('layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ asset('css/pages/tags/index.min.css') }}">
@endsection

@section('content')
  <main class="page-main"></main>
@endsection

@section('scripts')
  <script src="{{ asset('js/pages/tags/index.min.js') }}" type="module"></script>
@endsection
