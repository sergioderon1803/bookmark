<script setup>
import { useI18n } from 'vue-i18n';
import { computed } from 'vue';

const { locale } = useI18n();

const locales = computed(() => [
    { code: 'es', label: 'Español' },
    { code: 'en', label: 'English' },
]);

function switchLocale(code) {
    locale.value = code;
    // Opcional: guardar en localStorage o backend
}
</script>

<template>
    <div class="flex items-center gap-2">
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $t('language') }}:</span>
        <template v-for="l in locales" :key="l.code">
            <button :class="[
                'px-2 py-1 rounded text-sm font-medium transition',
                locale.value === l.code
                    ? 'bg-purple-600 text-white'
                    : 'bg-white text-purple-700 border border-purple-600 hover:bg-purple-50 dark:bg-gray-800 dark:text-purple-300'
            ]" @click="switchLocale(l.code)" :disabled="locale.value === l.code">
                {{ l.label }}
            </button>
        </template>
    </div>
</template>
