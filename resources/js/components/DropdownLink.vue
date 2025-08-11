<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: { type: String, required: true }
});
</script>

<template>
    <Link :href="href"
        class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-200 hover:bg-purple-50 dark:hover:bg-gray-700 focus:outline-none">
    <slot />
    </Link>
</template>
