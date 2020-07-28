<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Visitors!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('visitors.status')}}">Status<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('visitors.index')}}">IP List<span class="sr-only"></span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link " data-toggle="modal" data-target="#versionModal">Version</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="{{route('visitors.search')}}" method="POST" role="search">
      {{ csrf_field() }}
      <div class="input-group">
        <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </div>
    </form>

  </div>
</nav>