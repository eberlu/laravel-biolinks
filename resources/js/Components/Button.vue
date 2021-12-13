<template>
    <div v-if="tag == 'button'">
        <button :type="type" class="inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring disabled:opacity-25 transition" :class="variants[variant]">
            <slot></slot>
        </button>
    </div>
    <div v-else>
        <a :href="href" class="inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring disabled:opacity-25 transition" :class="variants[variant]">
            <slot></slot>
        </a>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: {
            type: {
                type: String,
                default: 'submit',
            },
            tag: {
                type: String,
                default: 'button'
            },
            variant: {
                type: String,
                default: 'secondary'
            },
            href: {
                type: String || null,
                default: null
            }
        },
        data() {
            return {
                variants: {

                    primary: 'border-transparent text-white bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:ring-gray-300 focus:border-gray-900',

                    secondary: 'bg-white border-gray-300 text-gray-700 hover:text-gray-500 focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50',


                }
            }
        }
    })
</script>
