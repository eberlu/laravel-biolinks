<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <content-page>
                <div class="overflow-hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <a class="dash-card p-6 bg-white shadow-2 text-left flex flex-col flex-nowrap justify-center" :href="route('profile.edit')">
                            <div class="flex items-center ml-12 mb-3">
                                <i class="fas fa-file text-2xl text-gray-400"></i>
                                <div class="ml-4 text-xl text-gray-600 leading-7 font-semibold">
                                    Meu Perfil
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-sm text-gray-500">
                                    Clique aqui para gerenciar as informações públicas de seu perfil.
                                </div>

                                <div class="mt-1 flex items-center text-md font-semibold">
                                    <div class="link text-indigo-700">Gerenciar Perfil</div>

                                    <div class="ml-1 text-indigo-500">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="dash-card p-6 bg-white shadow-2 text-left flex flex-col flex-nowrap justify-center" :href="route('links.index')">
                            <div class="flex items-center ml-12 mb-3">
                                <i class="fas fa-link text-2xl text-gray-400"></i>
                                <div class="ml-4 text-xl text-gray-600 leading-7 font-semibold">
                                    Links do perfil
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-sm text-gray-500">
                                    Clique aqui para gerenciar os links de seu perfil.
                                </div>

                                <div class="mt-1 flex items-center text-md font-semibold">
                                    <div class="link text-indigo-700">Gerenciar Links</div>

                                    <div class="ml-1 text-indigo-500">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="dash-card p-6 bg-white shadow-2 text-left flex flex-col flex-nowrap justify-center lg:col-span-2" :href="route('profile.show')">
                            <div class="flex items-center ml-12 mb-3">
                                <i class="fas fa-user text-2xl text-gray-400"></i>
                                <div class="ml-4 text-xl text-gray-600 leading-7 font-semibold">
                                    Minha Conta
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-sm text-gray-500">
                                    Clique aqui para gerenciar sua conta.
                                </div>

                                <div class="mt-1 flex items-center text-md font-semibold">
                                    <div class="link text-indigo-700">Gerenciar Conta</div>

                                    <div class="ml-1 text-indigo-500">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </content-page>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import ContentPage from '@/Components/ContentPage.vue'

    export default defineComponent({
        components: {
            AppLayout, ContentPage
        }
    })
</script>

<style scoped>
.dash-card:hover .link {
    color: var(--color-primary);
}
</style>
