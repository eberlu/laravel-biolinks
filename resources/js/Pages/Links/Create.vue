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
                    <form-section @submitted="save">

                        <template #form>
                   
                            <!-- title -->
                            <div class="col-span-6 sm:col-span-3">
                                <jet-label for="title" value="Título" />
                                <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="title" />
                                <jet-input-error :message="form.errors.title" class="mt-2" />
                            </div>

                            <!-- url -->
                            <div class="col-span-6 sm:col-span-3">
                                <jet-label for="url" value="URL" />
                                <jet-input id="url" type="text" class="mt-1 block w-full" v-model="form.url" />
                                <jet-input-error :message="form.errors.url" class="mt-2" />
                            </div>

                            <!-- icon -->
                            <div class="col-span-6">
                                <jet-label for="icon" value="Selecione o ícone (não é obrigatório)" class="mb-3"/>
                                <jet-input id="icon" type="hidden" v-model="form.icon" />
                                <IconSelector @selected="iconSelected" :selected="form.icon"/>
                            </div>

                        </template>

                        <template #actions>
                            <jet-action-message :on="form.recentlySuccessful" class="mb-5">
                                Link criado com sucesso
                            </jet-action-message>

                            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Salvar
                            </jet-button>
                        </template>
                    </form-section>
                </content-page>
            </div>

        </app-layout>
    </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import ContentPage from '@/Components/ContentPage.vue'
import FormSection from '@/Components/FormSection.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
import IconSelector from '@/Components/IconSelector.vue'

export default {
    components: {
        AppLayout, 
        ContentPage, 
        JetActionMessage,
        JetButton,
        FormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
        IconSelector
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
        iconSelected(icon) {
            this.form.icon = icon
        }
    }
}
</script>