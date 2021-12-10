<template>
    <app-layout title="Links">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Links
            </h2>
        </template>

        <div class="py-12">
            <content-page>
                
                {{ $page.props.links }}

            </content-page>
        </div>

    </app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import ContentPage from '@/Components/ContentPage.vue'

export default {
    components: {
        AppLayout, ContentPage
    },
    props: ['links']
}
</script>