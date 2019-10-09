@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-8 offset-md-2">
    
    <h1>{{ !$tag->exists ? 'New ' : ' Update '}} tag form</h1>

    <hr>
    
    @if (!$tag->exists)
    <form action="{{ route('tag.store') }}" method="POST">
    @else
    <form action="{{ route('tag.update', $tag->id) }}" method="POST" data-parsley-validate>
      @method('PUT')        
    @endif
      @csrf
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome tag" value="{{ old('nome', $tag->nome) }}" data-parsley-required data-parsley-maxlength="150">
      </div>  
      <button type="submit" class="btn btn-primary">{{ !$tag->exists ? 'Save' : ' Update'}}</button>
    </form>
  </div>  
</div>
@endsection


@section('script_footer')
 <script type="text/javascript">

 </script> 
@endsection

 