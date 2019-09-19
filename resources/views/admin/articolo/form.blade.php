@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-6 offset-md-3">
    
    <h1>{{ !$articolo->exists ? 'New ' : ' Update '}} article form</h1>

    <hr>
    
    @if (!$articolo->exists)
    <form action="{{ route('article.store') }}" method="POST">
    @else
    <form action="{{ route('article.update', $articolo->id) }}" method="POST" data-parsley-validate>
      @method('PUT')        
    @endif
      @csrf
      <div class="form-group">
        <label for="titolo">Titolo</label>
        <input type="text" class="form-control" id="titolo" name="titolo" placeholder="Titolo articolo" value="{{ old('titolo', $articolo->titolo) }}" data-parsley-required data-parsley-maxlength="150">
      </div>
      <div class="form-group">
        <label for="corpo">Contenuto</label>
        <textarea class="form-control" id="corpo" name="corpo" rows="3" data-parsley-required>{{ old('corpo', $articolo->corpo) }}</textarea>        
      </div>  
      <button type="submit" class="btn btn-primary">{{ !$articolo->exists ? 'Save' : ' Update'}}</button>
    </form>
  </div>  
</div>
@endsection


@section('script_footer')
 <script type="text/javascript">

  tinymce.init({
    selector: '#corpo'
  });

</script> 
@endsection

 