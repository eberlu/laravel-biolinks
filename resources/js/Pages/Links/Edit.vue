<template>
    <div>
        <app-layout title="Links">
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Editar Link
                </h2>
            </template>

            <div class="py-12">
                <content-page>
                    {{ $page.props.link }}
                </content-page>
            </div>

        </app-layout>
    </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import ContentPage from '@/Components/ContentPage.vue'
export default {
    props: ['link'],
    components: {
        AppLayout, 
        ContentPage, 
    },
}
</script>