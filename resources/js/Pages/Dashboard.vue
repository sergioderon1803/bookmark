<script setup>
import BaseLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()
</script>

<template>
  <Head :title="t('dashboard.title')" />

  <BaseLayout>
    <h1 class="text-3xl font-bold mb-6">{{ t('dashboard.welcome') }}</h1>
    
  </BaseLayout>
</template>
