<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contentType.index') }}">
                    Content Types
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('content.index') }}">
                    Content
                </a>
            </li>
            <!-- Add more navigation links as needed -->
        </ul>
    </div>
</nav>
