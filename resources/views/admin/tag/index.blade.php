@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-10 offset-md-1">
    <h1>Elenco tags</h1>
    <a class="btn btn-primary m-2" href="{{ route('tag.create') }}">Nuovo tag</a>
    <hr>
    @if ($tags->count())
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tags as $tag)
        <form action="{{ route('tag.destroy', $tag->id) }}" method="post" id="delete_tag_{{$tag->id}}">
          @csrf
          @method('DELETE')
        </form>
        <tr>
          <th scope="row">{{$tag->id}}</th>
          <td>{{$tag->nome}}</td>
          <td><a href="{{ route( 'tag.edit', $tag->id ) }}" class="btn btn-primary mdi mdi-file-document-edit">modifica</a></td>
          <td><a  data-id="{{$tag->id}}" href="" class="delete btn btn-danger mdi mdi-trash-can-outline">elimina</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>    
        
    @endif
        
  
  </div>  
</div>
@endsection