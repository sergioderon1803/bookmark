<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';
import LocaleSwitcher from '@/components/LocaleSwitcher.vue';

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    locale: {
        type: String,
        default: 'es',
    },
});

const { t, locale } = useI18n();
locale.value = props.locale;
</script>

<template>

    <Head :title="t('welcome.title')" />
    <div class="bg-gradient-to-br from-green-50 via-blue-50 to-purple-100 min-h-screen text-gray-800
           dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 dark:text-gray-100">
        <div class="relative flex min-h-screen flex-col items-center justify-center
             selection:bg-purple-400 selection:text-white">
            <!-- LocaleSwitcher en esquina superior derecha -->
            <div class="absolute top-6 right-8 z-20">
                <LocaleSwitcher />
            </div>

            <div class="relative w-full max-w-2xl px-6 lg:max-w-4xl">
                <header class="flex flex-col items-center gap-4 py-10">
                    <div class="flex items-center gap-3">
                        <svg class="h-14 w-14 text-purple-600" fill="none" viewBox="0 0 48 48">
                            <rect x="8" y="8" width="32" height="32" rx="6" fill="currentColor" opacity="0.15" />
                            <rect x="14" y="14" width="20" height="20" rx="3" fill="currentColor" opacity="0.4" />
                            <path d="M18 18h12v12H18z" fill="currentColor" />
                        </svg>
                        <span class="text-3xl font-bold text-purple-700 dark:text-purple-300">{{ t('app_name') }}</span>
                    </div>
                    <p class="text-lg text-center max-w-xl">
                        {{ t('welcome.intro.1') }}
                        <span class="font-semibold text-purple-700 dark:text-purple-300">{{ t('app_name') }}</span>,
                        {{ t('welcome.intro.2') }}
                    </p>

                    <nav v-if="canLogin" class="flex gap-4 mt-4">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class="rounded-md px-4 py-2 bg-purple-600 text-white font-semibold shadow hover:bg-purple-700 transition">
                        {{ t('welcome.dashboard') }}
                        </Link>
                        <template v-else>
                            <Link :href="route('login')"
                                class="rounded-md px-4 py-2 bg-purple-600 text-white font-semibold shadow hover:bg-purple-700 transition">
                            {{ t('login') }}
                            </Link>
                            <Link v-if="canRegister" :href="route('register')"
                                class="rounded-md px-4 py-2 bg-white text-purple-700 font-semibold border border-purple-600 shadow hover:bg-purple-50 transition">
                            {{ t('register') }}
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-8">
                    <div class="grid gap-8 lg:grid-cols-2">
                        <div class="flex flex-col gap-4 rounded-lg bg-white/80 p-8 shadow-lg dark:bg-gray-800/80">
                            <h2
                                class="text-2xl font-semibold text-purple-700 dark:text-purple-300 flex items-center gap-2">
                                <svg class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24">
                                    <path
                                        d="M4 19.5A2.5 2.5 0 0 0 6.5 22h11a2.5 2.5 0 0 0 2.5-2.5V6a2 2 0 0 0-2-2H7.5A1.5 1.5 0 0 0 6 5.5V19.5z"
                                        fill="currentColor" />
                                    <path
                                        d="M6 5.5A1.5 1.5 0 0 1 7.5 4H18a2 2 0 0 1 2 2v13.5A2.5 2.5 0 0 1 17.5 22h-11A2.5 2.5 0 0 1 4 19.5V6a1.5 1.5 0 0 1 2-1.5z"
                                        fill="currentColor" opacity="0.2" />
                                </svg>
                                {{ t('welcome.track_title') }}
                            </h2>
                            <p>
                                {{ t('welcome.track_desc') }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-4 rounded-lg bg-white/80 p-8 shadow-lg dark:bg-gray-800/80">
                            <h2
                                class="text-2xl font-semibold text-purple-700 dark:text-purple-300 flex items-center gap-2">
                                <svg class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                        fill="currentColor" />
                                </svg>
                                {{ t('welcome.discover_title') }}
                            </h2>
                            <p>
                                {{ t('welcome.discover_desc') }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-4 rounded-lg bg-white/80 p-8 shadow-lg dark:bg-gray-800/80">
                            <h2
                                class="text-2xl font-semibold text-purple-700 dark:text-purple-300 flex items-center gap-2">
                                <svg class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24">
                                    <path d="M17 20.5V4a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v16.5" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" />
                                    <rect x="7" y="2" width="8" height="20.5" rx="2" fill="currentColor"
                                        opacity="0.1" />
                                </svg>
                                {{ t('welcome.lists_title') }}
                            </h2>
                            <p>
                                {{ t('welcome.lists_desc') }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-4 rounded-lg bg-white/80 p-8 shadow-lg dark:bg-gray-800/80">
                            <h2
                                class="text-2xl font-semibold text-purple-700 dark:text-purple-300 flex items-center gap-2">
                                <svg class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" />
                                    <path d="M8 12h8M12 8v8" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>
                                {{ t('welcome.community_title') }}
                            </h2>
                            <p>
                                {{ t('welcome.community_desc') }}
                            </p>
                        </div>
                    </div>
                </main>

                <footer class="py-10 text-center text-sm text-gray-500 dark:text-gray-400 mt-12">
                    &copy; {{ new Date().getFullYear() }} {{ t('app_name') }} - Laravel v{{ laravelVersion }} (PHPv{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
