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
            <a class="topbar_menu" href="/#beranda">Fitur</a>
        </li>
        <li class="nav-item dropdown">
            <a class="topbar_menu" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Pricing
                <span><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Software</a>
              <a class="dropdown-item" href="{{ route('front.product') }}">Software + Perangkat</a>
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
            <div class="topbar_menu">
                <a href="{{ route('login') }}" class="btn btn-seccondary">
                    Login
                </a>
            </div>
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