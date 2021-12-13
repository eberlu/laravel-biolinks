<template>
    <div>
        <div class="collapse rounded bg-white shadow-md" :class="{ collapsed }">
            <div class="collapse-head border-b border-slate-50 py-4 px-6 px-md-8 py-md-6">
                <button type="button" class="collapse-button" @click.prevent="collapseToggle()">
                    <slot name="button"></slot>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </button>
            </div>
            <div class="collapse-content">
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
    props: {
        isCollapsed: {
            type: Boolean,
            default: false
        }
    },
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
    },
    mounted() {
        this.collapsed = this.isCollapsed
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
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.collapse-button i {
    transition: all .5s ease;
}

.collapse-content {
    max-height: 0;
    transition: all .5s ease;
}

.collapse.collapsed .collapse-content {
    max-height: 999px;
}
.collapse.collapsed .collapse-button i {
    transform: rotate(90deg);
}

</style>