<template>
    <app-layout title="Links">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Links
            </h2>
        </template>

        <div class="py-12">
            <content-page>

                <div class="flex items-center justify-start w-full mb-5">
                    <Button tag="a" :href="route('links.create')" variant="primary">
                        Criar Link
                    </Button>
                </div>

                <table-default :fields="fields" :items="links.data">

                    <template v-slot:icon="slotData">
                        <i :class="slotData.row.icon"></i>
                    </template>

                    <template v-slot:id="slotData">
                        <div class="flex align-items-center">
                            <a :href="route('links.edit', slotData.row.id)" class="w-9 h-9 rounded-full border border-gray-800 text-gray-800 text-xs flex items-center justify-center hover:bg-gray-700 hover:text-white mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" @click.prevent="openModalDelete(slotData.row.id)" class="w-9 h-9 rounded-full border border-red-500 text-red-500 text-xs flex items-center justify-center hover:bg-red-500 hover:text-white">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </template>

                </table-default>

                <div class="mt-5">
                    <pagination :links="links.links" />
                </div>

                <jet-dialog-modal :show="deleteModalOpen" @close="closeModalDelete">
                    <template #title>
                        Deletar Link
                    </template>

                    <template #content>
                        Esta ação é irreversível e permanente, cuidado.
                    </template>

                    <template #footer>
                        <jet-secondary-button @click="closeModalDelete">
                            Cancelar
                        </jet-secondary-button>

                        <jet-danger-button class="ml-2" @click="deleteLink(this.deleteCurrentId)">
                            Deletar Link
                        </jet-danger-button>
                    </template>
                </jet-dialog-modal>

            </content-page>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import ContentPage from '@/Components/ContentPage.vue'
import Pagination from '@/Components/Pagination.vue'
import TableDefault from '@/Components/TableDefault.vue'
import JetDialogModal from '@/Jetstream/DialogModal.vue'
import JetDangerButton from '@/Jetstream/DangerButton.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
import Button from '@/Components/Button.vue'

export default {
    components: {
        AppLayout, 
        ContentPage, 
        Pagination, 
        TableDefault,
        JetDialogModal,
        JetDangerButton,
        JetSecondaryButton,
        Button
    },
    props: ['links'],
    data(){
        return {
            deleteModalOpen: false,
            deleteCurrentId: null,
            fields: [ 
                { name: 'icon',     display: '#' },
                { name: 'title',    display: 'Título' },
                { name: 'url',      display: 'URL' },
                { name: 'id',       display: '#',   class: 'td-action'}
            ],
        }
    },
    methods: {
        openModalDelete(id) {
            this.deleteModalOpen = true
            this.deleteCurrentId = id
        },

        closeModalDelete() {
            this.deleteModalOpen = false
            this.deleteCurrentId = null
        },

        deleteLink(id) {
            let url = route('links.destroy', id)
            this.$inertia.delete(url, {
                onFinish: () => {
                    this.deleteModalOpen = false
                    this.deleteCurrentId = null
                }
            })
        }
    }
}
</script>