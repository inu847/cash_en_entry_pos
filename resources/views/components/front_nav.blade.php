<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="/">
        <img  src="{{ asset('img/logo_horizontal.png') }}">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="topbar_menu" href="#beranda">Fitur</a>
        </li>
        <li class="nav-item">
            <a class="topbar_menu" href="">
                Pricing
                <span><i class="fa fa-angle-down"></i></span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        <li class="nav-item ">
            <a class="topbar_menu" target="_blank" href="https://wa.me/6283113190652?text=Halo%20Admin%20Cash%20N%20Entry">Contact</a>
        </li>
        {{-- <li class="nav-item">
            <select class="topbar_menu p-2" id="language" name="language" onchange="location = this.value;">
                <option value="EN">EN</option>
                <option value="ID">ID</option>
            </select>
        </li> --}}
        <li class="nav-item">
            <a href="{{ route('login') }}" class="topbar_menu">
                Login
            </a>
        </li>
        <li class="nav-item">
            <div class="topbar_menu">
                <button class="btn btn-success" style="background-color: #23DD1F;">
                    Ajukan Demo
                </button>
            </div>
        </li>
      </ul>
    </div>
</nav>