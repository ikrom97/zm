@extends('layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ asset('css/pages/index.min.css') }}">
@endsection

@section('content')
  <main class="page-main"></main>
@endsection

@section('scripts')
  <script src="{{ asset('js/pages/index.min.js') }}" type="module"></script>
@endsection
