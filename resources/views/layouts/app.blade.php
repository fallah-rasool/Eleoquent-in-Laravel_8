<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Start Css --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- End Css --}}
    @yield('css')
</head>
<body>
    
    <section class="container-fluid">
        <section class="row p-3 bg-secondary">
            @yield('content');
        </section>
    </section>
   


    {{-- start js --}}
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- End js --}}
    @yield('js')
</body>
</html>