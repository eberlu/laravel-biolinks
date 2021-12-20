<template>
    <div>
        <app-layout title="Links">
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Criar Link
                </h2>
            </template>

            <div class="py-12">
                <content-page>
                    <FormLinks :form="form" @changeIcon="changeIcon" @save="save"/>
                </content-page>
            </div>

        </app-layout>
    </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import ContentPage from '@/Components/ContentPage.vue'
import FormLinks from './_form.vue'

export default {
    components: {
        AppLayout, 
        ContentPage, 
        FormLinks
    },
    props: ['link'],
    data(){
        return {
            form: this.$inertia.form({
                title: this.$page.props.link.title,
                url: this.$page.props.link.url,
                icon: this.$page.props.link.icon,
            })
        }
    },
    methods: {
        save(){
            this.form.post(route('links.update', this.$page.props.link.id))
        },
        changeIcon(icon) {
            this.form.icon = icon
        }
    }
}
</script>