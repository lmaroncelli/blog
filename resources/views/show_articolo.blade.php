@extends('layouts.site')

@section('content')
<main class="post blog-post col-lg-8"> 
  <div class="container">
    <div class="post-single">
        
      <div class="post-meta d-flex justify-content-between">
        <div class="category">{{$articolo->getCategorie()}}</div>
      </div>
      
      <h1>{{$articolo->titolo}}</h1>
      
      <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
        <div class="d-flex align-items-center flex-wrap">       
          <div class="date"><i class="icon-clock"></i> {{$articolo->updated_at->locale('it_IT')->diffForHumans()}}</div>
        </div>
      </div>
      
      <div class="post-body">
        {!!$articolo->corpo!!}
      </div>

      <div class="post-tags">
        {{$articolo->getTags()}}
      </div>

    </div>
  </div>
</main>
 
@endsection
