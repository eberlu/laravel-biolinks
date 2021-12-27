<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - {{ $profile->nickname }}</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome5/all.min.css') }}">
</head>
<body style="background-color: #262626;">

    <header class="header flex flex-col items-center justify-center py-8" style="color: #fff;">
        <div class="avatar w-32 h-32 bg-no-repeat bg-cover bg-center rounded-full flex" style="background-image: url({{ $profile->avatar }})"></div>

        <h1 class="mt-5 font-medium text-3xl">{{ $profile->nickname }}</h1>
        <h2 class="mt-3 font-light">{{ $profile->description }}</h2>
    </header>

    <main class="main container mx-auto px-3 sm:px-8 md:max-w-screen-sm" style="color #262626;">

        <section class="links flex flex-col items-center justify-center">
            
            @foreach ($profile->links as $link)
                <a href="{{ $link->url }}" class="bg-white m-7 shadow-md mt-0 w-full text-left rounded-md flex items-center justify-start relative hover:shadow-none transition-shadow duration-500" target="_blank">
                    <i class="fas fa-cube px-5 py-3 text-center h-full rounded-l-md text-2xl mr-5 -left-1 relative" style="background-color: #262626; color: #fff; border: 1px solid #262626;"></i>
                    {{ $link->title }}
                </a>
            @endforeach

        </section>
    </main>

    <footer class="footer mt-5 text-center p-5" style="color: #fff;">
        {{ env('APP_NAME') }} - {{ date('Y') }}
    </footer>

</body>
</html>