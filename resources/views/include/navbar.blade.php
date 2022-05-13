<nav class="navbar navbar-expand-md navbar-inverse navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="{{ route('home') }}">Manage</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Bookings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('available.index') }}">Available</a>
            </li>
        </ul>
    </div>
</nav>