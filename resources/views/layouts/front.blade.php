<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fs/css/all.min.css">
</head>

<body>
    <header class='py-2 bg-light'>
        <div class="container">
            <div class="d-flex flex-wrap">
                <a href="#" class='me-auto navbar-brand text-dark text-capitalize'>
                    Front
                </a>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{route('products.search')}}" class="text-dark nav-link">
                            Products
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class='my-2'>
        <div class="container">
            @yield('main')
        </div>
    </div>
    <script src='/js/jquery.js'></script>
    <script src='/bs/js/bootstrap.bundle.min.js'></script>
</body>

</html>