<template>
    <div>
        <form @submit.prevent="updateLayout()">
            <collapse>
                <template #button>
                    Layout
                </template>
                <template #content>
                    <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-3">
                        <div>
                            <jet-label>Cor Principal</jet-label>
                            <input type="color" v-model="form.color_primary" class="w-full" style="height: 70px;"/>
                        </div>
                        <div>
                            <jet-label>Cor Secundária</jet-label>
                            <input type="color" v-model="form.color_secondary" class="w-full" style="height: 70px;"/>
                        </div>
                    </div>
                </template>

                <template #footer>
                    <div class="flex items-center">
                        <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" variant="primary">
                            Salvar
                        </Button>

                        <jet-action-message :on="form.recentlySuccessful" class="ml-3">
                            Layout Salvo
                        </jet-action-message>
                    </div>
                </template>
            </collapse>
        </form>
    </div>
</template>

<script>
import Button from '@/Components/Button.vue'
import Collapse from '@/Components/Collapse.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import InputPhone from '@/Components/InputPhone.vue'

export default {
    props: ['profile'],
    components: {
        Button,
        Collapse,
        JetLabel,
        JetActionMessage,
        InputPhone,
    },
    data() {
        return {
            suckerCanvas: null,
            suckerArea: [],
            isSucking: false,
            form: this.$inertia.form({
                _method: 'PUT',
                color_primary: this.profile.color_primary,
                color_secondary: this.profile.color_secondary,
            }),
        }
    },
    methods: {
        updateLayout() {
            this.form.post(route('profile.layout.update'), {
                errorBag: 'updateLayout',
                preserveScroll: true,
            })
        },
    }
}
</script>
