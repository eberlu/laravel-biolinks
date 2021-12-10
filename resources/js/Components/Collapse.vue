<template>
    <div>
        <div class="collapse rounded bg-white shadow-md">
            <div class="collapse-head border-b border-slate-50 py-4 px-6 px-md-8 py-md-6">
                <button type="button" class="collapse-button" @click.prevent="collapseToggle()">
                    <slot name="button"></slot>
                </button>
            </div>
            <div class="collapse-content" :class="{ collapsed }">
                <div class="px-6 py-4 px-md-8 py-md-6">
                    <slot name="content"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Collapse',
    data() {
        return {
            collapsed: false
        }
    },
    methods: {
        collapseToggle() {
            this.collapsed = !this.collapsed
            this.$root.$emit('toggle::collapse')
        }
    }
}
</script>

<style scoped>

.collapse {
    overflow: hidden;
    position: relative;
}

.collapse-button {
    width: 100%;
    height: 100%;
    text-align: left;
}

.collapse-content {
    max-height: 0;
    transition: all 3s linear;
}

.collapse-content.collapsed {
    max-height: 999px;
}

</style>