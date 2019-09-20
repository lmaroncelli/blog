@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-10 offset-md-1">
    
    <h1>Elenco articoli</h1>

    <hr>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titolo</th>
          <th scope="col">Creato</th>
          <th scope="col">Modificato</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($articoli as $articolo)
        <form action="{{ route('article.destroy', $articolo->id) }}" method="post" id="delete_article_{{$articolo->id}}">
          @csrf
          @method('DELETE')
        </form>
        <tr>
          <th scope="row">{{$articolo->id}}</th>
          <td><a href="{{ route( 'article.show', $articolo->id ) }}">{{$articolo->titolo}}</a></td>
          <td>{{$articolo->created_at->format('d/m/Y H:i')}}</td>
          <td>{{$articolo->updated_at->locale('it_IT')->diffForHumans()}}</td>
          <td><a href="{{ route( 'article.edit', $articolo->id ) }}" class="btn btn-sm btn-primary mdi mdi-file-document-edit">modifica</a></td>
          <td><a  data-id="{{$articolo->id}}" href="" class="delete btn btn-sm btn-danger mdi mdi-trash-can-outline">elimina</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>    
  </div>  
</div>
@endsection