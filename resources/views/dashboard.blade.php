@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <ul>
        <li><a href="{{ route('article.index') }}">Articoli</a></li>
        <li><a href="{{ route('category.index') }}">Categorie</a></li>
        <li><a href="{{ route('tag.index') }}">Tags</a></li>
      </ul>
    </div>
  </div>
@endsection
