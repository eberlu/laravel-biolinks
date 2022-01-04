<div class="modal micromodal-slide" id="modal-share" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-share-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-share-title">
                    Micromodal
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="modal-share-content">
                <a class="share-link" href="https://wa.me/send?text={{route('profile',$profile->code)}}" target="_blank">
                    <i class="fab fa-whatsapp whatsapp"></i>
                    Enviar link no whatsapp
                </a >
            </main>
        </div>
    </div>
</div>