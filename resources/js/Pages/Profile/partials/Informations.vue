<template>
    <div>
        <form @submit.prevent="updateInformations()">
            <collapse :isCollapsed="true">
                <template #button>
                    Informações
                </template>
                <template #content>
                    <div class="grid grid-cols-1">
                        <div class="flex flex-col items-center">
                            <div class="grid grid-cols-1 w-full">
                                <div class="mt-2">
                                    <jet-label for="nickname" value="Nickname" />
                                    <jet-input id="nickname" type="text" class="block w-full" v-model="form.nickname" />
                                    <jet-input-error :message="form.errors.nickname" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <jet-label for="description" value="Status" />
                                    <jet-input id="description" type="text" class="block w-full" v-model="form.description" />
                                    <jet-input-error :message="form.errors.description" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <jet-label for="url" value="Endereço de seu perfil (URL)" />
                                    <jet-input id="url" type="text" class="block w-full" v-model="form.url" />
                                    <jet-input-error :message="form.errors.url" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <jet-label for="phone" value="Telefone para contato" />
                                    <input-phone id="phone" type="text" class="block w-full" v-model="form.phone" />
                                    <jet-input-error :message="form.errors.phone" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <jet-label for="whatsapp" value="Whatsapp para contato" />
                                    <input-phone id="whatsapp" type="text" class="block w-full" v-model="form.whatsapp" />
                                    <jet-input-error :message="form.errors.whatsapp" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <jet-label for="email" value="Email para contato" />
                                    <jet-input id="email" type="email" class="block w-full" v-model="form.email" />
                                    <jet-input-error :message="form.errors.email" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                <template #footer>
                    <div class="flex items-center">
                        <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" variant="primary">
                            Salvar
                        </Button>

                        <jet-action-message :on="form.recentlySuccessful" class="ml-3">
                            Informações salvas
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
import InputPhone from '@/Components/InputPhone.vue'

export default {
    props: ['profile'],
    components: {
        Button,
        Collapse,
        JetInput,
        JetLabel,
        JetInputError,
        JetActionMessage,
        InputPhone
    },
    data() {
        return {
            form: this.$inertia.form({
                _method: 'PUT',
                nickname: this.profile.nickname,
                description: this.profile.description,
                url: this.profile.url,
                phone: this.profile.phone,
                whatsapp: this.profile.whatsapp,
                email: this.profile.email
            }),
        }
    },
    methods: {
        updateInformations() {
            this.form.post(route('profile.infos.update'), {
                errorBag: 'updateInformations',
                preserveScroll: true,
            })
        }
    }
}
</script>
