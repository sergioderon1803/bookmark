<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import DeleteUserForm from './Partials/DeleteUserForm.vue'
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue'
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue'
import { Head } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
})

const { t } = useI18n()
</script>

<template>

    <Head :title="t('profile.title')" />

    <AuthenticatedLayout>
        <div class="space-y-8">
            <h1 class="text-2xl font-bold text-gray-800">
                {{ t('profile.title') }}
            </h1>

            <!-- Información de perfil -->
            <div class="bg-white shadow sm:rounded-lg p-6">
                <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-2xl" />
            </div>

            <!-- Cambio de contraseña -->
            <div class="bg-white shadow sm:rounded-lg p-6">
                <UpdatePasswordForm class="max-w-2xl" />
            </div>

            <!-- Borrar cuenta -->
            <div class="bg-white shadow sm:rounded-lg p-6">
                <DeleteUserForm class="max-w-2xl" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
