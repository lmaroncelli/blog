<div class="widget categories">
  <header>
    <h3 class="h6">Categories</h3>
  </header>
  @foreach ($categories as $cat)
    <div class="item d-flex justify-content-between"><a href="#">{{$cat->nome}}</a><span>{{$cat->articoli_count}}</span></div>
  @endforeach
</div>