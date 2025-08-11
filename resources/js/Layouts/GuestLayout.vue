<script setup>
import { useSlots } from 'vue';
const slots = useSlots();
</script>

<template>
    <div class="bg-gradient-to-br from-green-50 via-blue-50 to-purple-100 min-h-screen flex items-center justify-center
           dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="w-full max-w-md p-8 bg-white/80 dark:bg-gray-800/80 rounded-xl shadow-lg backdrop-blur">
            <slot />
        </div>
    </div>
</template>
