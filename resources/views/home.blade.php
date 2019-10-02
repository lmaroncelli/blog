@extends('layouts.site')

@section('content')
<div class="row">
  <div class="post col-xl-8">
    @foreach ($articoli as $articolo)
        @include('show_articolo')
    @endforeach
  </div>
</div>
 <!-- Pagination -->
@endsection
