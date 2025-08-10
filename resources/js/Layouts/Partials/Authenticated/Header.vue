<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import UserSettingsDropdown from '@/components/UserSettingsDropdown.vue'

const { t } = useI18n()
const page = usePage()
const userRole = page.props.auth?.user?.role || null
</script>

<template>
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">

            <!-- Logo -->
            <Link href="/" class="text-xl font-bold text-blue-600 hover:text-blue-800">
            {{ t('app_name') }}
            </Link>

            <!-- Menú principal -->
            <nav class="space-x-4">
                <Link href="/dashboard" class="hover:underline">{{ t('admin.menu_home') }}</Link>

                <!-- Botón visible solo si es admin -->
                <template v-if="userRole === 'admin'">
                    <Link href="/admin" class="hover:underline font-semibold text-red-600">
                    {{ t('admin.panel_title') }}
                    </Link>
                </template>
            </nav>

            <!-- Botón de usuario -->
            <UserSettingsDropdown />
        </div>
    </header>
</template>
