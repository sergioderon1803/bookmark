<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import AdminHeader from '@/Layouts/Partials/Admin/Header.vue'
import AdminSidebar from '@/Layouts/Partials/Admin/Sidebar.vue'
import AdminFooter from '@/Layouts/Partials/Admin/Footer.vue'

const { t } = useI18n()
const page = usePage()
</script>

<template>
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <AdminHeader />

        <div class="flex flex-1">
            <!-- Sidebar -->
            <AdminSidebar />

            <!-- Contenido principal -->
            <main class="flex-1 p-6 bg-gray-50">
                <slot />
            </main>
        </div>

        <!-- Footer -->
        <AdminFooter />
    </div>
</template>
