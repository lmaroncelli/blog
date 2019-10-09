@extends('layouts.site')

@section('content')
  <main class="posts-listing col-lg-8">
    <div class="container">
    {{-- <search-component></search-component> --}}
    <articles></articles>
    </div>
  </main>
 <!-- Pagination -->
@endsection
