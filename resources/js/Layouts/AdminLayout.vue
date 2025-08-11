<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import Header from '@/Layouts/Partials/Admin/Header.vue'
import Sidebar from '@/Layouts/Partials/Admin/Sidebar.vue'
import Footer from '@/Layouts/Partials/Admin/Footer.vue'

const { t } = useI18n()
const page = usePage()
</script>

<template>
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <Header />

        <div class="flex flex-1">
            <!-- Sidebar -->
            <Sidebar />

            <!-- Contenido principal -->
            <main class="flex-1 p-6 bg-gray-50">
                <slot />
            </main>
        </div>

        <!-- Footer -->
        <Footer />
    </div>
</template>
