<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import { Head, Link, usePage } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'

const { t, locale } = useI18n()
locale.value = usePage().props.locale || 'es'

const form = useForm({
    name: '',
})

const submit = () => {
    form.post(route('admin.authors.store'), {
        onSuccess: () => form.reset(),
    })
}
</script>

<template>
    <AdminLayout>

        <Head>
            <title>{{ t('admin.create_author') }}</title>
        </Head>

        <div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded shadow">
            <h1 class="text-2xl font-bold mb-6">{{ t('admin.create_author') }}</h1>

            <form @submit.prevent="submit" novalidate>
                <div class="mb-4">
                    <label class="block mb-1 font-semibold" for="name">{{ t('admin.author_name') }}</label>
                    <input id="name" type="text" v-model="form.name" class="w-full border p-2 rounded"
                        autocomplete="off" />
                    <label class="block mb-1 font-semibold" for="biography">{{ t('admin.author_biography') }}</label>
                    <input id="biography" type="text" v-model="form.biography" class="w-full border p-2 rounded"
                        autocomplete="off" />
                    <div v-if="form.errors.name" class="text-red-600 mt-1">{{ form.errors.name }}</div>
                    <div v-if="form.errors.biography" class="text-red-600 mt-1">{{ form.errors.biography }}</div>
                </div>

                <button type="submit" :disabled="form.processing"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 disabled:opacity-50">
                    {{ t('admin.create_author') }}
                </button>

                <Link href="/admin/authors" class="inline-block ml-4 text-blue-600 hover:underline">
                {{ t('admin.back_to_list') }}
                </Link>
            </form>
        </div>
    </AdminLayout>
</template>
