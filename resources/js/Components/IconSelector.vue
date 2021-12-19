<template>
    <div>

        <div class="mt-2 mb-2 pt-2 pb-2 border flex items-center justify-center flex-col" v-show="selected">
            <i :class="selected" class="text-4xl" />
            <div class="mt-2">
                Selecionado: {{ selected }}
            </div>
            <div class="mt-2">
                <danger-button type="button" @click.prevent="removeSelect()">
                    Remover seleção
                </danger-button>
            </div>
        </div>

        <button type="button" class="bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition w-full p-4" @click.prevent="toggleIcons()">
            Mostrar/Esconder ícones
        </button>

        <ul class="icons-nav w-full grid grid-cols-4 sm:grid-cols-5 md:grid-cols-8 lg:grid-cols-12 mt-5" :class="{ active }">
            <li v-for="(icon, key) in icons" :key="key" class="m-3">
                <button class="icon-button-selector w-full h-12 bg-white shadow transition hover:shadow-none" type="button" :class="{ selected: selected == icon }" @click.prevent="selectIcon(icon)">
                    <i :class="icon" class="text-2xl" />
                </button>
            </li>
        </ul>

    </div>
</template>

<script>
import icons from '@/faicons.js'
import DangerButton from '@/Jetstream/DangerButton.vue'

export default {
    components: { DangerButton },
    emits: ['selected'],
    props: ['selected'],
    data() {
        return {
            active: true,
            icons: icons,
        }
    },

    methods: {
        toggleIcons() {
            this.active = !this.active
        },
        selectIcon(icon) {
            this.$emit('selected', icon)
        },
        removeSelect() {
            this.$emit('selected', null)
        }
    }
}
</script>

<style scoped>
.icons-nav {
    max-height: 0;
    overflow: hidden;
    transition: all .5s ease;
}

.icons-nav.active {
    max-height: 9999px;
}
.icon-button-selector.selected {
    box-shadow: none;
    border: 2px solid var(--color-primary);
}
</style>