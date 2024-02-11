<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">User Name: {{ $userInfo->last_name }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Photos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Transsactions</a>
        </li>
        </ul>
        <span class="navbar-text">
        employee specific header
        </span>
    </div>
    </div>
</nav>