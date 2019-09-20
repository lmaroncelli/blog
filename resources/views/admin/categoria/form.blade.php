@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-8 offset-md-2">
    
    <h1>{{ !$categoria->exists ? 'New ' : ' Update '}} category form</h1>

    <hr>
    
    @if (!$categoria->exists)
    <form action="{{ route('category.store') }}" method="POST">
    @else
    <form action="{{ route('category.update', $categoria->id) }}" method="POST" data-parsley-validate>
      @method('PUT')        
    @endif
      @csrf
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome categoria" value="{{ old('nome', $categoria->nome) }}" data-parsley-required data-parsley-maxlength="150">
      </div>  
      <button type="submit" class="btn btn-primary">{{ !$categoria->exists ? 'Save' : ' Update'}}</button>
    </form>
  </div>  
</div>
@endsection


@section('script_footer')
 <script type="text/javascript">

 </script> 
@endsection

 