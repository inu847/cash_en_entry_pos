<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="/">
        <img height="40" src="{{ asset('img/logo_horizontal.png') }}">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="topbar_menu" href="#beranda">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="topbar_menu" href="#beranda">Tentang Kami</a>
        </li>
        <li class="nav-item">
            <a class="topbar_menu" href="#feature">Fitur</a>
        </li>
        <li class="nav-item">
            <a class="topbar_menu" href="#client">Client</a>
        </li>
        <li class="nav-item">
            <a class="topbar_menu" target="_blank" href="https://wa.me/6283113190652?text=Halo%20Admin%20Cash%20N%20Entry">Contact Us</a>
        </li>
        <li class="nav-item">
            <select class="topbar_menu p-2" id="language" name="language" onchange="location = this.value;">
                <option value="EN">EN</option>
                <option value="ID">ID</option>
            </select>
        </li>
        <li class="nav-item">
            <button style="margin-left: 20px;" type="button" class="mt-2 btn btn-success btn-rounded mr-3" data-toggle="modal" data-target="#exampleModal">
                Ajukan Demo
            </button>
        </li>
      </ul>
    </div>
</nav>