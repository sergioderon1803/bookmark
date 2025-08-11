<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { computed } from 'vue';
import { useI18n } from 'vue-i18n';
import LocaleSwitcher from '@/components/LocaleSwitcher.vue';

const props = defineProps({
    status: {
        type: String,
    },
    locale: { type: String, default: 'es' }
});

const { t, locale } = useI18n();
locale.value = props.locale;

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>

    <Head :title="t('email_verification')" />

    <div class="bg-gradient-to-br from-green-50 via-blue-50 to-purple-100 min-h-screen flex items-center justify-center
          dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 relative">

        <div class="absolute top-6 right-8">
            <LocaleSwitcher />
        </div>

        <div class="w-full max-w-md p-8 bg-white/80 dark:bg-gray-800/80 rounded-xl shadow-lg backdrop-blur text-center">
            <h1 class="text-2xl font-bold text-purple-700 dark:text-purple-300 mb-6">{{ t('email_verification') }}</h1>

            <p class="mb-4 text-gray-700 dark:text-gray-300">
                {{ t('verify_email_prompt') }}
            </p>

            <p v-if="verificationLinkSent" class="mb-4 font-medium text-green-600 dark:text-green-400">
                {{ t('verification_link_sent_message') }}
            </p>

            <form @submit.prevent="submit" class="flex flex-col gap-4 items-center">
                <PrimaryButton class="w-full px-6 py-2" :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing">
                    {{ t('resend_verification_email') }}
                </PrimaryButton>

                <Link :href="route('logout')" method="post" as="button"
                    class="mt-2 rounded-md text-sm text-gray-600 underline hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                {{ t('log_out') }}
                </Link>
            </form>
        </div>
    </div>
</template>
