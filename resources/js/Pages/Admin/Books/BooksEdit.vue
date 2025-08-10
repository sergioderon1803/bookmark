<script setup>
import { useForm } from '@inertiajs/vue3'
import { Head, Link, usePage } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'

const { book, authors } = usePage().props

const { t, locale } = useI18n()
locale.value = usePage().props.locale || 'es'

const form = useForm({
    title: book.title || '',
    author_id: book.author_id || null,
    published_year: book.published_year || ''
})

const submit = () => {
    form.put(route('admin.books.update', book.id), {
        onSuccess: () => {
            form.reset('published_year')
        }
    })
}
</script>

<template>

    <Head>
        <title>{{ t('admin.edit_book') }}</title>
    </Head>

    <div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-6">{{ t('admin.edit_book') }}</h1>

        <form @submit.prevent="submit" novalidate>
            <div class="mb-4">
                <label for="title" class="block mb-1 font-semibold">{{ t('admin.book_title') }}</label>
                <input id="title" type="text" v-model="form.title" class="w-full border p-2 rounded"
                    autocomplete="off" />
                <div v-if="form.errors.title" class="text-red-600 mt-1">{{ form.errors.title }}</div>
            </div>

            <div class="mb-4">
                <label for="author_id" class="block mb-1 font-semibold">{{ t('admin.book_author') }}</label>
                <select id="author_id" v-model="form.author_id" class="w-full border p-2 rounded">
                    <option :value="null">-- {{ t('admin.select_author') }} --</option>
                    <option v-for="author in authors" :key="author.id" :value="author.id">
                        {{ author.name }}
                    </option>
                </select>
                <div v-if="form.errors.author_id" class="text-red-600 mt-1">{{ form.errors.author_id }}</div>
            </div>

            <div class="mb-4">
                <label for="published_year" class="block mb-1 font-semibold">{{ t('admin.book_published_year')
                    }}</label>
                <input id="published_year" type="number" v-model="form.published_year" class="w-full border p-2 rounded"
                    autocomplete="off" />
                <div v-if="form.errors.published_year" class="text-red-600 mt-1">{{ form.errors.published_year }}</div>
            </div>

            <button type="submit" :disabled="form.processing"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 disabled:opacity-50">
                {{ t('admin.update_book') }}
            </button>

            <Link href="/admin/books" class="inline-block ml-4 text-blue-600 hover:underline">
            {{ t('admin.back_to_list') }}
            </Link>
        </form>
    </div>
</template>
