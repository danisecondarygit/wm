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
                    Panel
                </a>
                <ul class="nav">
                    <li class="nav-item"><a href="{{route('panel.categories.management')}}" class="text-dark nav-link">
                            Categories
                        </a></li>
                    <li class="nav-item"><a href="{{route('panel.new-category')}}" class="text-dark nav-link">
                            New category
                        </a></li>
                    <li class="nav-item"><a href="{{route('panel.products.management')}}" class="text-dark nav-link">
                            Products
                        </a></li>
                    <li class="nav-item"><a href="{{route('panel.new-product')}}" class="text-dark nav-link">
                            New product
                        </a></li>
                    <li class="nav-item"><a href="{{route('panel.new-attribute-group')}}" class="text-dark nav-link">
                            New attribute group
                        </a></li>
                    <li class="nav-item"><a href="{{route('panel.attribute-groups.management')}}"
                            class="text-dark nav-link">
                            Attribute groups
                        </a></li>
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