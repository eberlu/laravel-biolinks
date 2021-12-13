<template>
    <app-layout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Perfil
            </h2>
        </template>

        <div class="py-12">
            <content-page>
                
                <collapse :isCollapsed="true">
                    <template #button>
                        Informações
                    </template>
                    <template #content>

                        <form @submit.prevent="updateInformations()">
                            <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-center">
                                
                                <div class="flex flex-col items-center">
                                    <div class="mt-2">
                                        <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                                    </div>
                                    <div class="mt-2">
                                        <Alert variant="warning">
                                            A foto exibida em seu perfil é a mesma usada em sua conta.
                                        </Alert>
                                    </div>
                                    <div class="mt-2">
                                        <Button variant="secondary" tag="a" :href="route('account')">
                                            Alterar imagem
                                        </Button>
                                    </div>
                                </div>

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
                                        <div class="mt-5 flex items-center">
                                            <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" variant="primary">
                                                Salvar
                                            </Button>

                                            <jet-action-message :on="form.recentlySuccessful" class="ml-3">
                                                Informações salvas
                                            </jet-action-message>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </template>
                </collapse>

                <collapse class="mt-5">
                    <template #button>
                        Redes Sociais
                    </template>
                </collapse>

            </content-page>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import ContentPage from '@/Components/ContentPage.vue'
import Collapse from '@/Components/Collapse.vue'
import Button from '@/Components/Button.vue'
import Alert from '@/Components/Alert.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'

export default {
    components: {
        AppLayout, 
        ContentPage, 
        Collapse, 
        Button,
        Alert,
        JetInput,
        JetLabel,
        JetInputError,
        JetActionMessage
    },
    props: ['profile', 'user'],
    data() {
        return {
            form: this.$inertia.form({
                _method: 'PUT',
                nickname: this.profile.nickname,
                description: this.profile.description,
                url: this.profile.url
            }),
        }
    },
    methods: {
        updateInformations() {
            this.form.post(route('profile.update'), {
                errorBag: 'updateInformations',
                preserveScroll: true,
            })
        }
    }
}
</script>