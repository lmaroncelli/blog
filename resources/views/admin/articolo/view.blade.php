@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-10 offset-md-1">
    
    <h1>{{$articolo->titolo}}</h1>

    <hr>
    
    {!!$articolo->corpo!!}
    
  </div>  
</div>
@endsection


@section('script_footer')
 <script type="text/javascript">

  tinymce.init({
    selector: '#corpo',
    plugins: "code, codesample, textpattern",
    toolbar: "codesample",
    //menubar: "tools"
  });

</script> 
@endsection

 