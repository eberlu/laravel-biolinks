<template>
    <app-layout title="Links">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Links
            </h2>
        </template>

        <div class="py-12">
            <content-page>

                <table-default :fields="fields" :items="links.data">

                    <template v-slot:icon="slotData">
                        <i :class="slotData.row.icon"></i>
                    </template>

                    <template v-slot:id="slotData">
                        <div class="flex align-items-center">
                            <button type="button" :data-id="slotData.row.id" class="w-9 h-9 rounded-full border border-indigo-500 text-indigo-500 text-xs flex items-center justify-center hover:bg-indigo-500 hover:text-white mr-2">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" :data-id="slotData.row.id" class="w-9 h-9 rounded-full border border-red-500 text-red-500 text-xs flex items-center justify-center hover:bg-red-500 hover:text-white">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </template>

                </table-default>

                <div class="mt-5">
                    <pagination :links="links.links" />
                </div>

            </content-page>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import ContentPage from '@/Components/ContentPage.vue'
import Pagination from '@/Components/Pagination.vue'
import TableDefault from '@/Components/TableDefault.vue'

export default {
    components: {
        AppLayout, 
        ContentPage, 
        Pagination, 
        TableDefault, 
    },
    props: ['links'],
    data(){
        return {
            fields: [ 
                { name: 'icon',     display: '#' },
                { name: 'title',    display: 'Título' },
                { name: 'url',      display: 'URL' },
                { name: 'id',       display: '#',   class: 'td-action'}
            ],
        }
    }
}
</script>