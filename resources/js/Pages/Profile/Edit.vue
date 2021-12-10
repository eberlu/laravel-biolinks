<template>
    <app-layout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Perfil
            </h2>
        </template>

        <div class="py-12">
            <content-page>
                
                <collapse>
                    <template #button>
                        Informações
                    </template>
                    <template #content>
                        Content info
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

export default {
    components: {
        AppLayout, ContentPage, Collapse
    },
    props: ['profile']
}
</script>