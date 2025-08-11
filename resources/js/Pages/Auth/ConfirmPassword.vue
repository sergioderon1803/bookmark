<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Confirm Password" />

        <div class="flex flex-col items-center mb-6">
            <svg class="h-12 w-12 text-purple-600 dark:text-purple-300" fill="none" viewBox="0 0 48 48">
                <rect x="8" y="8" width="32" height="32" rx="6" fill="currentColor" opacity="0.15" />
                <rect x="14" y="14" width="20" height="20" rx="3" fill="currentColor" opacity="0.4" />
                <path d="M18 18h12v12H18z" fill="currentColor" />
            </svg>
            <h1 class="text-2xl font-bold text-purple-700 dark:text-purple-300 mt-2">
                Confirm Password
            </h1>
        </div>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-300 text-center">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <InputLabel for="password" value="Password" />
                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    autocomplete="current-password" autofocus />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex justify-end">
                <PrimaryButton class="px-6 py-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
