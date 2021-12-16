<template>
    <div>
        <form @submit.prevent="updateInformations()">
            <collapse :isCollapsed="true">
                <template #button>
                    Informações
                </template>
                <template #content>
                    <div class="grid grid-cols-1">
                        <div class="flex flex-col items-center">
                            <div class="grid grid-cols-1 w-full">
                                <div class="mt-2">
                                    <jet-label for="nickname" value="Nickname" />
                                    <jet-input id="nickname" type="text" class="block w-full" v-model="form.nickname" />
                                    <jet-input-error :message="form.errors.nickname" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <jet-label for="description" value="Status" />
                                    <jet-input id="description" type="text" class="block w-full" v-model="form.description" />
                                    <jet-input-error :message="form.errors.description" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <jet-label for="url" value="Endereço de seu perfil (URL)" />
                                    <jet-input id="url" type="text" class="block w-full" v-model="form.url" />
                                    <jet-input-error :message="form.errors.url" class="mt-2" />
                                </div>
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
                            Informações salvas
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

export default {
    props: ['profile'],
    components: {
        Button,
        Collapse,
        JetInput,
        JetLabel,
        JetInputError,
        JetActionMessage
    },
    data() {
        return {
            form: this.$inertia.form({
                _method: 'PUT',
                nickname: this.profile.nickname,
                description: this.profile.description,
                url: this.profile.url
            }),
        }
    },
    methods: {
        updateInformations() {
            this.form.post(route('profile.update'), {
                errorBag: 'updateInformations',
                preserveScroll: true,
            })
        }
    }
}
</script>
