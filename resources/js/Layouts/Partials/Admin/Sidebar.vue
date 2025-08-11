<script setup>
import { Link } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()
</script>

<template>
    <aside class="w-64 bg-white border-r p-4">
        <nav class="flex flex-col gap-2">
            <Link href="/admin" class="px-3 py-2 rounded hover:bg-gray-100">
            {{ t('admin.menu_home') }}
            </Link>
            <Link href="/admin/users" class="px-3 py-2 rounded hover:bg-gray-100">
            {{ t('admin.users_title') }}
            </Link>
            <Link href="/admin/books" class="px-3 py-2 rounded hover:bg-gray-100">
            {{ t('admin.books_title') }}
            </Link>
            <Link href="/admin/authors" class="px-3 py-2 rounded hover:bg-gray-100">
            {{ t('admin.authors_title') }}
            </Link>
        </nav>
    </aside>
</template>
