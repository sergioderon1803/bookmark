<script setup>
import BaseLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()
</script>

<template>
  <Head :title="t('admin.panel_title')" />

  <BaseLayout>
    <h1 class="text-3xl font-bold mb-6">{{ t('admin.panel_title') }}</h1>

    <nav class="flex flex-col gap-4">
      <Link href="/admin/users" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        {{ t('admin.manage_users') }}
      </Link>
      <Link href="/admin/books" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
        {{ t('admin.manage_books') }}
      </Link>
    </nav>
  </BaseLayout>
</template>
