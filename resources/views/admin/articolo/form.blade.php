@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-8 offset-md-2">
    
    <h1>{{ !$articolo->exists ? 'Nuovo ' : ' Modifica '}} articolo</h1>

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
      <div class="form-group">
        <label for="categorie">Categorie</label>      
        <select id="categorie" class="form-control select2" name="categorie[]" multiple>
          @foreach ($categorie as $cat)
            <option value="{{$cat->id}}" @if (in_array($cat->id,$categorie_assegnate_ids)) selected @endif>{{$cat->nome}}</option>  
          @endforeach
        </select>
      </div>  
      <button type="submit" class="btn btn-primary">{{ !$articolo->exists ? 'Salva' : ' Aggiorna'}}</button>
      <a href="{{ route('article.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
  </div>  
</div>
@endsection


@section('script_footer')
 <script type="text/javascript">

  tinymce.init({
    selector: '#corpo',
    height: 800,
    toolbar: ['bold|italic|underline|strikethrough | codesample | cut | copy | paste | formatselect | fontselect | blockquote | bullist | numlist | removeformat'],
    plugins: "code, codesample, textpattern, hr",
    codesample_languages: [
        {text: 'HTML/XML', value: 'markup'},
        {text: 'JavaScript', value: 'javascript'},
        {text: 'CSS', value: 'css'},
        {text: 'PHP', value: 'php'},
        {text: 'Ruby', value: 'ruby'},
        {text: 'Python', value: 'python'},
        {text: 'Java', value: 'java'},
        {text: 'C', value: 'c'},
        {text: 'C#', value: 'csharp'},
        {text: 'C++', value: 'cpp'}
    ],
    textpattern_patterns: [
    {start: '*', end: '*', format: 'italic'},
    {start: '**', end: '**', format: 'bold'},
    {start: '#', format: 'h1'},
    {start: '##', format: 'h2'},
    {start: '###', format: 'h3'},
    {start: '####', format: 'h4'},
    {start: '#####', format: 'h5'},
    {start: '######', format: 'h6'},
    {start: '1. ', cmd: 'InsertOrderedList'},
    {start: '* ', cmd: 'InsertUnorderedList'},
    {start: '- ', cmd: 'InsertUnorderedList' },
    {start: '* ', cmd: 'InsertUnorderedList'},
    {start: '- ', cmd: 'InsertUnorderedList'},
    {start: '1. ', cmd: 'InsertOrderedList', value: { 'list-style-type': 'decimal' }},
    {start: '1) ', cmd: 'InsertOrderedList', value: { 'list-style-type': 'decimal' }},
    {start: 'a. ', cmd: 'InsertOrderedList', value: { 'list-style-type': 'lower-alpha' }},
    {start: 'a) ', cmd: 'InsertOrderedList', value: { 'list-style-type': 'lower-alpha' }},
    {start: 'i. ', cmd: 'InsertOrderedList', value: { 'list-style-type': 'lower-roman' }},
    {start: 'i) ', cmd: 'InsertOrderedList', value: { 'list-style-type': 'lower-roman' }},
    {start: '---', replacement: '<hr/>'},
    {start: '--', replacement: '—'},
    {start: '-', replacement: '—'},
    {start: '(c)', replacement: '©'},
    {start: '//brb', replacement: 'Be Right Back'},
    {start: '//heading', replacement: '<h1 style="color: blue">Heading here</h1> <h2>Author: Name here</h2> <p><em>Date: 01/01/2000</em></p> <hr />'}
    ] 
    
  });

</script> 
@endsection

 