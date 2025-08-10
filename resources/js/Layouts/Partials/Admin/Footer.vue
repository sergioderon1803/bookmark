<script setup>
import { useI18n } from 'vue-i18n'

const { t } = useI18n()
</script>

<template>
    <footer class="bg-white text-gray-500 text-center py-3 border-t">
        © {{ new Date().getFullYear() }} - {{ t('admin.panel_title') }}
    </footer>
</template>
