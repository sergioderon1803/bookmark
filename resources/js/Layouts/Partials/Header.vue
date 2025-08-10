<script setup>
import { Link } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import UserSettingsDropdown from '@/components/UserSettingsDropdown.vue'

const { t } = useI18n()
</script>

<template>
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo -->
            <Link href="/" class="text-xl font-bold text-blue-600 hover:text-blue-800">
            {{ t('app_name') }}
            </Link>

            <!-- Menú -->
            <nav class="space-x-4">
                <Link href="/" class="hover:underline">{{ t('admin.menu_home') }}</Link>
                <Link href="/admin/books" class="hover:underline">{{ t('admin.menu_books') }}</Link>
                <Link href="/admin/users" class="hover:underline">{{ t('admin.menu_users') }}</Link>
            </nav>

            <!-- Usuario -->
            <UserSettingsDropdown />
        </div>
    </header>
</template>
