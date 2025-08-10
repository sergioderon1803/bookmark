<script setup>
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
</script>

<template>
    <footer class="bg-gray-100 py-4 mt-8 border-t">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-600 text-sm">
            &copy; {{ new Date().getFullYear() }} {{ t('app_name') }} - {{ t('app_rights') }}
        </div>
    </footer>
</template>
