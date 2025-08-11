<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Head, Link } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()
</script>

<template>

    <Head :title="t('admin.menu_home')" />

    <AdminLayout>
        <h2 class="text-2xl font-bold mb-6">{{ t('admin.welcome') }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Tarjeta de gestión de usuarios -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="font-semibold mb-2">{{ t('admin.manage_users') }}</h3>
                <p class="text-gray-600 mb-4">{{ t('admin.users_description') }}</p>
                <Link href="/admin/users" class="text-blue-600 hover:underline">{{ t('admin.go_to_users') }}</Link>
            </div>

            <!-- Tarjeta de gestión de libros -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="font-semibold mb-2">{{ t('admin.manage_books') }}</h3>
                <p class="text-gray-600 mb-4">{{ t('admin.books_description') }}</p>
                <Link href="/admin/books" class="text-blue-600 hover:underline">{{ t('admin.go_to_books') }}</Link>
            </div>

            <!-- Tarjeta para futuras secciones -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="font-semibold mb-2">{{ t('admin.more_sections') }}</h3>
                <p class="text-gray-600">{{ t('admin.more_coming_soon') }}</p>
            </div>
        </div>
    </AdminLayout>
</template>
