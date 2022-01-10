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
<body style="background-color: {{  $profile->color_primary }};">

    <header class="header flex flex-col items-center justify-center py-8" style="color: {{  $profile->color_secondary }};">
        <div class="avatar w-28 h-28 bg-no-repeat bg-cover bg-center rounded-full flex" style="background-image: url({{ $profile->avatar }})"></div>

        <h1 class="mt-4 font-medium text-3xl">{{ $profile->nickname }}</h1>
        <h2 class="mt-1 font-light">{{ $profile->description }}</h2>

        @include('profile.social')

    </header>

    <main class="main container mx-auto px-10 sm:max-w-md lg:max-w-screen-sm" style="color: {{  $profile->color_primary }};">

        <section class="actions flex items-center justify-center mb-10 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3" style="color: {{  $profile->color_secondary }}">
            <button type="button" class="p-3 flex flex-col items-center justify-center action rounded-sm lg:hover:scale-105 transition" style="border-color: rgba(250,250,250,.2);" id="btnQR">
                <i class="text-lg fas fa-qrcode"></i>
                <span class="text-xs mt-2 ">QR Code</span>
            </button>
            <a href="{{ route('profile.card.download', $profile->code) }}" class="p-3 flex flex-col items-center justify-center action rounded-sm lg:hover:scale-105 transition" style="border-color: rgba(250,250,250,.2);" >
                <i class="text-lg fas fa-download"></i>
                <span class="text-xs mt-2 ">Download</span>
            </a>
            <button type="button" class="p-3 flex flex-col items-center justify-center action rounded-sm lg:hover:scale-105 transition" style="border-color: rgba(250,250,250,.2);" id="btnShare">
                <i class="text-lg fas fa-share"></i>
                <span class="text-xs mt-2 ">Compartilhar</span>
            </button>
            <a href="https://wa.me/55{{preg_replace("/[^0-9]/", "", $profile->whatsapp)}}" class="p-3 flex flex-col items-center justify-center action rounded-sm lg:hover:scale-105 transition" style="border-color: rgba(250,250,250,.2);" target="_blank">
                <i class="text-lg fab fa-whatsapp"></i>
                <span class="text-xs mt-2 ">Conversar</span>
            </a>
            <a href="mailto:{{ $profile->email }}" class="p-3 flex flex-col items-center justify-center action rounded-sm lg:hover:scale-105 transition" style="border-color: rgba(250,250,250,.2);" target="_blank">
                <i class="text-lg fas fa-envelope"></i>
                <span class="text-xs mt-2 ">Email</span>
            </button>
            <a href="tel:+55{{ $profile->phone }}" class="p-3 flex flex-col items-center justify-center action rounded-sm lg:hover:scale-105 transition" style="border-color: rgba(250,250,250,.2);">
                <i class="text-lg fas fa-phone"></i>
                <span class="text-xs mt-2 ">Ligar</span>
            </a>
        </section>

        <section class="links flex flex-col items-center justify-center">
            
            @foreach ($profile->links as $link)
                <a href="{{ $link->url }}" class="m-7 shadow-lg mt-0 w-full text-left rounded-sm flex items-center justify-start relative hover:shadow-none transition-shadow duration-500" target="_blank" style="background-color: {{  $profile->color_secondary }};">
                    <i class="fas {{ ($link->icon) ? $link->icon : 'fa-cube' }} px-3 py-2 sm:py-3 text-center h-full rounded-l-md text-2xl mr-3  relative" style="background-color: {{  $profile->color_primary }}; color: {{  $profile->color_secondary }}; border: 2px solid {{  $profile->color_secondary }};"></i>
                    {{ $link->title }}
                </a>
            @endforeach

        </section>
    </main>

    <footer class="footer mt-5 text-center p-5" style="color: {{  $profile->color_secondary }};">
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