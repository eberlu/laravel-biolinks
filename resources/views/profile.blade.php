<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - {{ $profile->nickname }}</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
</head>
<body class="bg-gray-100">

    <header class="header flex flex-col items-center justify-center py-8">
        <div class="avatar w-32 h-32 bg-no-repeat bg-cover bg-center rounded-full flex" style="background-image: url({{ $profile->avatar }})"></div>

        <h1 class="mt-5">{{ $profile->nickname }}</h1>
        <h2 class="mt-3">{{ $profile->description }}</h2>
    </header>

    <main class="main container mx-auto px-3 sm:px-8 md:max-w-screen-sm">

        <section class="links flex flex-col items-center justify-center">
            @foreach ($profile->links as $link)
                <a href="{{ $link->url }}" class="bg-white shadow m-5 mt-0 w-full text-center py-5 rounded-lg" target="_blank">
                    {{ $link->title }}
                </a>
            @endforeach
        </section>
    </main>

    <footer class="footer mt-5 text-center p-5">
        {{ env('APP_NAME') }} - {{ date('Y') }}
    </footer>

</body>
</html>