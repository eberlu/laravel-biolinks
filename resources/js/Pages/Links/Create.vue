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
                    <FormLinks :form="form" @changeIcon="changeIcon" @save="save" actionMessage="Link criado com sucesso"/>
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
    data(){
        return {
            form: this.$inertia.form({
                title: null,
                url: null,
                icon: null,
            })
        }
    },
    methods: {
        save(){
            this.form.post(route('links.store'), {
                onSuccess: () => this.form.reset()
            })
        },
        changeIcon(icon) {
            this.form.icon = icon
        }
    }
}
</script>