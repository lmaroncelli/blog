@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-10 offset-md-1">
    <div class="d-flex">
      <h1 class="mt-2">Elenco articoli</h1>
      <div class="ml-auto p-2">
        <a class="btn btn-primary m-2" href="{{ route('article.create') }}">Nuovo articolo</a>
      </div>
    </div>
    {{-- <hr> --}}
    @if ($articoli->count())
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th>Titolo</th>
          <th>Categorie</th>
          <th>Creato</th>
          <th>Modificato</th>
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
          <td>{{$articolo->getCategorie()}}</td>
          <td>{{$articolo->created_at->format('d/m/Y H:i')}}</td>
          <td>{{$articolo->updated_at->locale('it_IT')->diffForHumans()}}</td>
          <td><a href="{{ route( 'article.edit', $articolo->id ) }}" class="btn btn-primary mdi mdi-file-document-edit"></a></td>
          <td><a  data-id="{{$articolo->id}}" href="" class="delete btn btn-danger mdi mdi-trash-can-outline"></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>    
    @endif
  </div>  
</div>
@endsection