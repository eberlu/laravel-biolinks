<section class="social mt-2 flex items-center justify-center flex-wrap">

    @if($profile->facebook)
        <a href="{{ $profile->facebook }}" class="btn-social btn-facebook" target="_blank">
            <i class="fab fa-facebook"> </i>
        </a>
    @endif

    @if($profile->instagram)
        <a href="{{ $profile->instagram }}" class="btn-social btn-instagram" target="_blank">
            <i class="fab fa-instagram"> </i>
        </a>
    @endif

    @if($profile->tiktok)
        <a href="{{ $profile->tiktok }}" class="btn-social btn-tiktok" target="_blank">
            <i class="fab fa-tiktok"> </i>
        </a>
    @endif

    @if($profile->twitter)
        <a href="{{ $profile->twitter }}" class="btn-social btn-twitter" target="_blank">
            <i class="fab fa-twitter"> </i>
        </a>
    @endif

    @if($profile->youtube)
        <a href="{{ $profile->youtube }}" class="btn-social btn-youtube" target="_blank">
            <i class="fab fa-youtube"> </i>
        </a>
    @endif

    @if($profile->linkedin)
        <a href="{{ $profile->linkedin }}" class="btn-social btn-linkedin" target="_blank">
            <i class="fab fa-linkedin"> </i>
        </a>
    @endif

    @if($profile->twitch)
        <a href="{{ $profile->twitch }}" class="btn-social btn-twitch" target="_blank">
            <i class="fab fa-twitch"> </i>
        </a>
    @endif

</section>