<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Head, Link, router, usePage } from '@inertiajs/vue3'
import { ref } from 'vue'
import { useI18n } from 'vue-i18n'
import Swal from 'sweetalert2'

const { books: booksFromServer, csrf_token } = usePage().props
const books = ref([...booksFromServer])

const { t, locale } = useI18n()
locale.value = usePage().props.locale || 'es'

async function confirmDelete(id) {
    const result = await Swal.fire({
        title: t('admin.swal.confirm_delete_book'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: t('delete'),
        cancelButtonText: t('cancel')
    })

    if (result.isConfirmed) {
        router.delete(`/admin/books/${id}`, {
            onSuccess: () => {
                books.value = books.value.filter(book => book.id !== id)
                Swal.fire(t('admin.swal.book_deleted'), '', 'success')
            }
        })
    }
}
</script>

<template>
    <AdminLayout>

        <Head :title="t('admin.books_title')" />

        <div class="mb-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">{{ t('admin.books_title') }}</h1>
            <Link href="/admin/books/create" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            {{ t('admin.create_book') }}
            </Link>
        </div>

        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">{{ t('admin.book_title') }}</th>
                    <th class="border border-gray-300 px-4 py-2">{{ t('admin.book_author') }}</th>
                    <th class="border border-gray-300 px-4 py-2">{{ t('admin.book_published_year') }}</th>
                    <th class="border border-gray-300 px-4 py-2">{{ t('actions') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="book in books" :key="book.id" class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ book.title }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ book.author || '-' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ book.published_year || '-' }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <Link :href="`/admin/books/${book.id}/edit`" class="text-blue-600 hover:underline mr-2">
                        {{ t('admin.edit') }}
                        </Link>
                        <button @click="confirmDelete(book.id)" class="text-red-600 hover:underline">
                            {{ t('delete') }}
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </AdminLayout>
</template>
