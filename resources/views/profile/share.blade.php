<div class="modal micromodal-slide" id="modal-share" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-share-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-share-title">
                    Compartilhar
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="modal-share-content">
                <a class="share-link p-3 flex items-center" href="https://api.whatsapp.com/send?text={{route('profile',$profile->code)}}" target="_blank" style="background-color: #128c7e; color: white;">
                    <i class="fab fa-whatsapp whatsapp text-2xl mr-3"></i>
                    Enviar link no whatsapp
                </a >
            </main>
        </div>
    </div>
</div>