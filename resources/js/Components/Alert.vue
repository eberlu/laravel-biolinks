<template>
    <div class="px-4 py-3 rounded" :class="variants[variant]">
        <slot></slot>
    </div>
</template>

<script>

import { defineComponent } from 'vue'

export default defineComponent({
    props: {
        variant: {
            type: String,
            default: 'secondary'
        },
    },
    data() {
        return {
            variants: {
                warning: 'bg-yellow-100 text-gray-700'
            }
        }
    }
})

</script>