<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';

const { t, locale } = useI18n();
locale.value = usePage().props.locale || 'es';

const form = useForm({
    name: '',
    email: '',
    role: 'user',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('admin.users.store'), {
        onSuccess: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>

<template>
    <AdminLayout>

        <Head>
            <title>{{ t('admin.create_user') }}</title>
        </Head>

        <div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded shadow">
            <h1 class="text-2xl font-bold mb-6">{{ t('admin.create_user') }}</h1>

            <form @submit.prevent="submit" novalidate>
                <div class="mb-4">
                    <label class="block mb-1 font-semibold" for="name">{{ t('admin.user_name') }}</label>
                    <input id="name" type="text" v-model="form.name" class="w-full border p-2 rounded"
                        autocomplete="name" />
                    <div v-if="form.errors.name" class="text-red-600 mt-1">{{ form.errors.name }}</div>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold" for="email">{{ t('admin.user_email') }}</label>
                    <input id="email" type="email" v-model="form.email" class="w-full border p-2 rounded"
                        autocomplete="email" />
                    <div v-if="form.errors.email" class="text-red-600 mt-1">{{ form.errors.email }}</div>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold" for="role">{{ t('admin.user_role') }}</label>
                    <select id="role" v-model="form.role" class="w-full border p-2 rounded">
                        <option value="user">{{ t('admin.roles.user') }}</option>
                        <option value="admin">{{ t('admin.roles.admin') }}</option>
                    </select>
                    <div v-if="form.errors.role" class="text-red-600 mt-1">{{ form.errors.role }}</div>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold" for="password">{{ t('password') }}</label>
                    <input id="password" type="password" v-model="form.password" class="w-full border p-2 rounded"
                        autocomplete="new-password" />
                    <div v-if="form.errors.password" class="text-red-600 mt-1">{{ form.errors.password }}</div>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold" for="password_confirmation">{{
                        t('password_confirmation')
                        }}</label>
                    <input id="password_confirmation" type="password" v-model="form.password_confirmation"
                        class="w-full border p-2 rounded" autocomplete="new-password" />
                </div>

                <button type="submit" :disabled="form.processing"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 disabled:opacity-50">
                    {{ t('admin.create_user') }}
                </button>

                <Link href="/admin/users" class="inline-block ml-4 text-blue-600 hover:underline">
                {{ t('admin.back_to_list') }}
                </Link>
            </form>
        </div>
    </AdminLayout>
</template>
