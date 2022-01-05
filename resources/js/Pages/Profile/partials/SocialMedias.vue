<template>
    <div>
        <form @submit.prevent="updateMedias()">
            <collapse :isCollapsed="true">
                <template #button>
                    Social
                </template>
                <template #content>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div class="mb-2">
                            <jet-label for="facebook">
                                <i class="fab fa-facebook text-lg"></i> Facebook
                            </jet-label>
                            <jet-input id="facebook" type="text" class="block w-full" v-model="form.facebook" />
                            <jet-input-error :message="form.errors.facebook" class="mt-2" />
                        </div>
                        <div class="mb-2">
                            <jet-label for="instagram">
                                <i class="fab fa-instagram text-lg"></i> Instagram
                            </jet-label>
                            <jet-input id="instagram" type="text" class="block w-full" v-model="form.instagram" />
                            <jet-input-error :message="form.errors.instagram" class="mt-2" />
                        </div>
                        <div class="mb-2">
                            <jet-label for="tiktok">
                                <i class="fab fa-tiktok text-lg"></i> TikTok
                            </jet-label>
                            <jet-input id="tiktok" type="text" class="block w-full" v-model="form.tiktok" />
                            <jet-input-error :message="form.errors.tiktok" class="mt-2" />
                        </div>
                        <div class="mb-2">
                            <jet-label for="twitter">
                                <i class="fab fa-twitter text-lg"></i> Twitter
                            </jet-label>
                            <jet-input id="twitter" type="text" class="block w-full" v-model="form.twitter" />
                            <jet-input-error :message="form.errors.twitter" class="mt-2" />
                        </div>
                        <div class="mb-2">
                            <jet-label for="linkedin">
                                <i class="fab fa-linkedin text-lg"></i> Linkedin
                            </jet-label>
                            <jet-input id="linkedin" type="text" class="block w-full" v-model="form.linkedin" />
                            <jet-input-error :message="form.errors.linkedin" class="mt-2" />
                        </div>
                        <div class="mb-2">
                            <jet-label for="youtube">
                                <i class="fab fa-youtube text-lg"></i> YouTube
                            </jet-label>
                            <jet-input id="youtube" type="text" class="block w-full" v-model="form.youtube" />
                            <jet-input-error :message="form.errors.youtube" class="mt-2" />
                        </div>
                        <div class="mb-2">
                            <jet-label for="twitch">
                                <i class="fab fa-twitch text-lg"></i> Twitch
                            </jet-label>
                            <jet-input id="twitch" type="text" class="block w-full" v-model="form.twitch" />
                            <jet-input-error :message="form.errors.twitch" class="mt-2" />
                        </div>
                        <div class="mb-2">
                            <jet-label for="gmaps">
                                <i class="fas fa-map-marker-alt text-lg"></i> Google Maps
                            </jet-label>
                            <jet-input id="gmaps" type="text" class="block w-full" v-model="form.gmaps" />
                            <jet-input-error :message="form.errors.gmaps" class="mt-2" />
                        </div>
                    </div>
                </template>

                <template #footer>
                    <div class="flex items-center">
                        <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" variant="primary">
                            Salvar
                        </Button>

                        <jet-action-message :on="form.recentlySuccessful" class="ml-3">
                            Redes Salvas
                        </jet-action-message>
                    </div>
                </template>
            </collapse>
        </form>
    </div>
</template>

<script>
import Button from '@/Components/Button.vue'
import Collapse from '@/Components/Collapse.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'

export default {
    props: ['profile'],
    components: {
        Button,
        Collapse,
        JetInput,
        JetLabel,
        JetInputError,
        JetActionMessage
    },
    data() {
        return {
            form: this.$inertia.form({
                _method: 'PUT',
                facebook: this.profile.facebook,
                instagram: this.profile.instagram,
                tiktok: this.profile.tiktok,
                twitter: this.profile.twitter,
                linkedin: this.profile.linkedin,
                youtube: this.profile.youtube,
                twitch: this.profile.twitch,
                gmaps: this.profile.gmaps,
            }),
        }
    },
    methods: {
        updateMedias() {
            this.form.post(route('profile.social.update'), {
                errorBag: 'updateMedias',
                preserveScroll: true,
            })
        }
    }
}
</script>
