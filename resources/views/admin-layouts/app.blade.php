<!DOCTYPE html>
<html>

<head>
    @include('admin-layouts.head')
</head>

<body>
    @include('admin-layouts.nav')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            @include('admin-layouts.sidebar')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
    @include('admin-layouts.footer')
</body>

</html>
