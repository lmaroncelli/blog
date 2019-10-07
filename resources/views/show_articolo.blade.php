<div class="post-details">
  <div class="post-meta d-flex justify-content-between">
    <div class="date meta-last">{{$articolo->created_at->locale('it_IT')->format('d F')}} | {{$articolo->created_at->format('Y')}}</div>
    <div class="category"><a href="#">{{$articolo->getCategorie()}}</a></div>
  </div>
  <a href="post.html">
    <h3 class="h4">{{$articolo->titolo}}</h3></a>
  <p class="text-muted">{{$articolo->getExcerpt()}}</p>
  <footer class="post-footer d-flex align-items-center">
    <div class="date">
      <i class="icon-clock"></i> {{$articolo->updated_at->locale('it_IT')->diffForHumans()}}
    </div>
    <span class="comments">ultimo aggiornamento</span>
  </footer>
</div>