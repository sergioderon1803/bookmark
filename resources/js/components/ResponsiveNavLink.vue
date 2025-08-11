<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: { type: String, required: true },
    active: { type: Boolean }
});

const classes = computed(() =>
    props.active
        ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-500 text-base font-medium text-indigo-700 bg-indigo-50 dark:bg-indigo-900 dark:text-indigo-300'
        : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 hover:border-gray-300 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800 dark:hover:border-gray-600 transition-colors duration-200'
);
</script>

<template>
    <Link :href="href" :class="classes">
    <slot />
    </Link>
</template>
