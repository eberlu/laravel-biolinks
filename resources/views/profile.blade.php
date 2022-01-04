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
        <div class="avatar w-28 h-28 bg-no-repeat bg-cover bg-center rounded-full flex" style="background-image: url({{ $profile->avatar }})"></div>

        <h1 class="mt-4 font-medium text-3xl">{{ $profile->nickname }}</h1>
        <h2 class="mt-1 font-light">{{ $profile->description }}</h2>

        <section class="social mt-2 flex items-center justify-center">
            <a href="" class="btn-social btn-facebook">
                <i class="fab fa-facebook"> </i>
            </a>
            <a href="" class="btn-social btn-instagram">
                <i class="fab fa-instagram"> </i>
            </a>
            <a href="" class="btn-social btn-tiktok">
                <i class="fab fa-tiktok"> </i>
            </a>
            <a href="" class="btn-social btn-twitter">
                <i class="fab fa-twitter"> </i>
            </a>
        </section>

    </header>

    <main class="main container mx-auto px-10 sm:max-w-md lg:max-w-screen-sm" style="color: #262626;">

        <section class="actions flex items-center justify-center mb-10" style="color: #fff">
            <button type="button" class="flex flex-col items-center justify-center action p-3 border border-gray-600 w-3/4 rounded-l-md" id="btnQR">
                <i class="fas fa-qrcode"></i>
                <span class="text-xs mt-2 hidden sm:flex">QR Code</span>
            </button>
            <button type="button" class="flex flex-col items-center justify-center action p-3 border-r border-t border-b border-gray-600 w-3/4" >
                <i class="fas fa-download"></i>
                <span class="text-xs mt-2 hidden sm:flex">Download</span>
            </button>
            <button type="button" class="flex flex-col items-center justify-center action p-3 border-r border-t border-b border-gray-600 w-3/4" id="btnShare">
                <i class="fas fa-share"></i>
                <span class="text-xs mt-2 hidden sm:flex">Compartilhar</span>
            </button>
            <button type="button" class="flex flex-col items-center justify-center action p-3 w-3/4 border border-r border-t border-b border-gray-600 rounded-r-md">
                <i class="fas fa-phone"></i>
                <span class="text-xs mt-2 hidden sm:flex">Ligar</span>
            </button>
        </section>

        <section class="links flex flex-col items-center justify-center">
            
            @foreach ($profile->links as $link)
                <a href="{{ $link->url }}" class="m-7 shadow-lg mt-0 w-full text-left rounded-md flex items-center justify-start relative hover:shadow-none transition-shadow duration-500" target="_blank" style="background-color: #fff;">
                    <i class="fas fa-cube px-3 py-2 sm:py-3 text-center h-full rounded-l-md text-2xl mr-3  relative" style="background-color: #262626; color: #fff; border: 2px solid #fff;"></i>
                    {{ $link->title }}
                </a>
            @endforeach

        </section>
    </main>

    <footer class="footer mt-5 text-center p-5" style="color: #fff;">
        {{ env('APP_NAME') }} - {{ date('Y') }}
    </footer>

    @include('profile.share')
    @include('profile.modalQR')

    {{-- input values for QR's and others exports  --}}
    <input type="hidden" value="{{ $profile->nickname }}" id="field-name" />
    <input type="hidden" value="{{ $profile->description }}" id="field-desc" />
    <input type="hidden" value="{{ $profile->email }}" id="field-email" />
    <input type="hidden" value="{{ $profile->phone }}" id="field-phone" />
    <input type="hidden" value="{{ route('profile', $profile->code) }}" id="field-code" />

    <script src="{{ asset('js/profile.js') }}"></script>

</body>
</html>