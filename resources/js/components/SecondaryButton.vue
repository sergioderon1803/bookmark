<script setup>
defineProps({
    type: { type: String, default: 'button' }
});
</script>

<template>
    <button :type="type"
        class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 active:scale-95 transition-all duration-150 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-700">
        <slot />
    </button>
</template>
