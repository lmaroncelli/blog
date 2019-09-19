@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-6 offset-md-3">
    
    <h1>Elenco articoli</h1>

    <hr>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titolo</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($articoli as $articolo)
        <tr>
          <th scope="row">{{$articolo->id}}</th>
          <td><a href="{{ route( 'article.edit', $articolo->id ) }}">{{$articolo->titolo}}</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>    

  </div>  
</div>
    
@endsection