<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';
import LocaleSwitcher from '@/components/LocaleSwitcher.vue';

const props = defineProps({
    locale: { type: String, default: 'es' }
});

const { t, locale } = useI18n();
locale.value = props.locale;

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

    <Head :title="t('register')" />

    <div class="bg-gradient-to-br from-green-50 via-blue-50 to-purple-100 min-h-screen flex items-center justify-center
                dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 relative">

        <!-- Botón para volver a Welcome arriba izquierda -->
        <div class="absolute top-6 left-8">
            <Link :href="route('welcome')"
                class="text-purple-600 hover:text-purple-800 dark:text-purple-400 dark:hover:text-purple-600 font-semibold">
            ← {{ t('back_to_welcome') }}
            </Link>
        </div>

        <!-- Switcher de idioma arriba derecha -->
        <div class="absolute top-6 right-8">
            <LocaleSwitcher />
        </div>

        <div class="w-full max-w-md p-8 bg-white/80 dark:bg-gray-800/80 rounded-xl shadow-lg backdrop-blur">
            <div class="flex flex-col items-center mb-6">
                <svg class="h-12 w-12 text-purple-600 dark:text-purple-300" fill="none" viewBox="0 0 48 48">
                    <rect x="8" y="8" width="32" height="32" rx="6" fill="currentColor" opacity="0.15" />
                    <rect x="14" y="14" width="20" height="20" rx="3" fill="currentColor" opacity="0.4" />
                    <path d="M18 18h12v12H18z" fill="currentColor" />
                </svg>
                <h1 class="text-2xl font-bold text-purple-700 dark:text-purple-300 mt-2">{{ t('register') }}</h1>
            </div>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <InputLabel for="name" :value="t('name')" />
                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                        autocomplete="name" />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                    <InputLabel for="email" :value="t('email')" />
                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                        autocomplete="username" />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div>
                    <InputLabel for="password" :value="t('password')" />
                    <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                        autocomplete="new-password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div>
                    <InputLabel for="password_confirmation" :value="t('confirm_password')" />
                    <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                        v-model="form.password_confirmation" required autocomplete="new-password" />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div class="flex items-center justify-between">
                    <Link :href="route('login')" class="text-sm text-purple-600 hover:underline dark:text-purple-400">
                    {{ t('already_registered') }}
                    </Link>
                    <PrimaryButton class="px-6 py-2" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        {{ t('register') }}
                    </PrimaryButton>
                </div>
            </form>

            <!-- Enlace para ir a Login debajo del formulario -->
            <p class="mt-6 text-center text-sm text-gray-700 dark:text-gray-300">
                {{ t('have_account') }}
                <Link :href="route('login')"
                    class="text-purple-600 hover:underline dark:text-purple-400 font-semibold ml-1">
                {{ t('login') }}
                </Link>
            </p>
        </div>
    </div>
</template>
