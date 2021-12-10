<template>
    <div>
        <div class="not-prose relative bg-grid-gray-100 bg-gray-50 rounded-xl overflow-hidden" style="background-position: 10px 10px;">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-50 opacity-60"></div>
            <div class="relative rounded-xl overflow-auto">
                <div class="shadow-sm overflow-x-auto my-8">
                    <table class="border-collapse table-fixed min-w-full text-sm">
                        <thead>
                            <tr>
                                <th v-for="(field, key) in fields" :key="key" class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-gray-400 text-left">
                                    {{ field.display ?? field.name }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr v-for="(item, key) in items" :key="key">
                                <td v-for="(field, key) in fields" :key="key" class="border-b border-gray-100 p-4 pl-8 text-gray-500" :class="field.class">
                                    <div v-if="hasSlotField(field.name)">
                                        <slot :name="field.name" :row="item"></slot>
                                    </div>
                                    <div v-else>
                                        {{ item[field.name] }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl"></div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        fields: Array,
        items: Array,
    },
    methods: {
        hasSlotField(fieldName) {
            return !!this.$slots[fieldName]
        }
    }
}
</script>