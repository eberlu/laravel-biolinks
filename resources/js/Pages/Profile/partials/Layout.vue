<template>
    <div>
        <form @submit.prevent="updateLayout()">
            <collapse :isCollapsed="true">
                <template #button>
                    Layout
                </template>
                <template #content>
                    <div class="grid grid-cols-1">
                        <div class="flex flex-col items-center">
                            <div class="grid grid-cols-1 w-full">

                                
                            </div>
                            
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
import JetInput from '@/Jetstream/Input.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import InputPhone from '@/Components/InputPhone.vue'

export default {
    props: ['profile'],
    components: {
        Button,
        Collapse,
        JetInput,
        JetLabel,
        JetInputError,
        JetActionMessage,
        InputPhone
    },
    data() {
        return {
            form: this.$inertia.form({
                _method: 'PUT',
                color_primary: this.profile.color_primary,
                color_secondary: this.profile.color_secondary
            }),
        }
    },
    methods: {
        updateLayout() {
            this.form.post(route('profile.layout.update'), {
                errorBag: 'updateLayout',
                preserveScroll: true,
            })
        }
    }
}
</script>
