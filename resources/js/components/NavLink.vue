<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: { type: String, required: true },
    active: { type: Boolean }
});

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center px-3 py-2 text-sm font-medium text-indigo-600 border-b-2 border-indigo-500 dark:text-indigo-400 dark:border-indigo-400 transition-colors duration-200'
        : 'inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-900 hover:border-gray-300 dark:text-gray-400 dark:hover:text-white dark:hover:border-gray-500 transition-colors duration-200'
);
</script>

<template>
    <Link :href="href" :class="classes">
    <slot />
    </Link>
</template>
