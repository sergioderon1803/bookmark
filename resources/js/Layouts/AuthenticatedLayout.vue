<script setup>
import { Head } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import Header from '@/Layouts/Partials/Header.vue'
import Footer from '@/Layouts/Partials/Footer.vue'

const { t } = useI18n()
</script>

<template>
    <!-- Head global -->
    <Head>
        <title>{{ t('app_name') }}</title>
        <meta name="description" content="Application with Laravel and Vue" />
    </Head>

    <!-- Header -->
    <Header />

    <!-- Contenido principal -->
    <main class="max-w-7xl mx-auto px-4 py-6">
        <slot />
    </main>

    <!-- Footer -->
    <Footer />
</template>
