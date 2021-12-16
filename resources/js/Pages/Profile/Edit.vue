<template>
    <app-layout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Perfil
            </h2>
        </template>

        <div class="py-12">
            <content-page>

                <Informations :profile="profile"/>

                <collapse class="mt-5">
                    <template #button>
                        Avatar
                    </template>
                    <template #content>
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
import Informations from './partials/informations.vue'

export default {
    components: {
        AppLayout, 
        ContentPage, 
        Collapse, 
        Button,
        Alert,
        Informations
    },
    props: ['profile', 'user'],
}
</script>