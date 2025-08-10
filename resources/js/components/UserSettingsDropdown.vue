<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()
const user = usePage().props.auth?.user

const menuOpen = ref(false)

const toggleMenu = () => {
    menuOpen.value = !menuOpen.value
}

const closeMenu = (e) => {
    if (!e.target.closest('.user-dropdown')) {
        menuOpen.value = false
    }
}

onMounted(() => {
    document.addEventListener('click', closeMenu)
})

onBeforeUnmount(() => {
    document.removeEventListener('click', closeMenu)
})
</script>

<template>
    <div v-if="user" class="relative user-dropdown">
        <!-- Botón -->
        <button @click="toggleMenu"
            class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none">
            <div>{{ user.name }}</div>
            <div class="ml-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 
                        10.586l3.293-3.293a1 1 0 111.414 
                        1.414l-4 4a1 1 0 01-1.414 
                        0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </button>

        <!-- Menú -->
        <div v-if="menuOpen" class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg py-1 z-50">
            <Link :href="route('profile.edit')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
            {{ t('profile_edit') }}
            </Link>

            <Link :href="route('logout')" method="post" as="button"
                class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
            {{ t('logout') }}
            </Link>
        </div>
    </div>

    <div v-else>
        <Link href="/login" class="text-blue-500 hover:underline">
        {{ t('auth.login') }}
        </Link>
    </div>
</template>
