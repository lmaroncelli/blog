@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-10 offset-md-1">
    
    <h1>Elenco categorie</h1>

    <a href="{{ route('category.create') }}">Nuova categoria</a>
    <hr>
    @if ($categorie->count())
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categorie as $categoria)
        <form action="{{ route('category.destroy', $categoria->id) }}" method="post" id="delete_category_{{$categoria->id}}">
          @csrf
          @method('DELETE')
        </form>
        <tr>
          <th scope="row">{{$categoria->id}}</th>
          <td>{{$categoria->nome}}</td>
          <td><a href="{{ route( 'category.edit', $categoria->id ) }}" class="btn btn-sm btn-primary mdi mdi-file-document-edit">modifica</a></td>
          <td><a  data-id="{{$categoria->id}}" href="" class="delete btn btn-sm btn-danger mdi mdi-trash-can-outline">elimina</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>    
        
    @endif
        
  
  </div>  
</div>
@endsection