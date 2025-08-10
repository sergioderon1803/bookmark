<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import UserSettingsDropdown from '@/components/UserSettingsDropdown.vue'

const { t } = useI18n()
const page = usePage()
</script>

<template>
    <header class="bg-white shadow-md sticky top-0 z-50 flex justify-between items-center px-0 py-3 max-w-full">

        <!-- Izquierda: título y botón sin padding lateral -->
        <div class="flex items-center gap-6 pl-4">
            <h1 class="text-xl font-semibold">
                {{ t('admin.panel_title') }}
            </h1>
            <Link href="/dashboard" class="px-3 py-1 text-sm bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
            ← {{ t('back_to_dashboard') }}
            </Link>
        </div>

        <!-- Derecha: botón usuario con algo de padding para no pegar al borde -->
        <div class="pr-4">
            <UserSettingsDropdown />
        </div>

    </header>
</template>
