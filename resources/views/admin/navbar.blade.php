<nav class="navbar navbar-dark bg-success fixed-top">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Admin Panel</span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-light btn-sm">Logout</button>
        </form>
    </div>
</nav>
