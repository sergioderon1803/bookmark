<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import LocaleSwitcher from '@/Components/LocaleSwitcher.vue';
</script>

<template>
  <div
    class="min-h-screen flex flex-col bg-gradient-to-br from-green-50 via-blue-50 to-purple-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-gray-800 dark:text-gray-100">
    <header class="p-4 flex justify-between items-center">
      <div class="flex items-center gap-3">
        <ApplicationLogo class="h-10 w-auto text-purple-600 dark:text-purple-300" />
        <span class="text-xl font-bold text-purple-700 dark:text-purple-300">{{ $t('app_name') }}</span>
      </div>
      <LocaleSwitcher />
    </header>

    <main class="flex-1">
      <slot />
    </main>

    <footer class="p-4 text-center text-sm text-gray-500 dark:text-gray-400">
      &copy; {{ new Date().getFullYear() }} {{ $t('app_name') }}
    </footer>
  </div>
</template>
