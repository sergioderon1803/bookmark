<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Head, Link, router, usePage } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import Swal from 'sweetalert2'
import { ref } from 'vue'

const { t, locale } = useI18n()
locale.value = usePage().props.locale || 'es'

const { authors: authorsFromServer } = usePage().props
const authors = ref([...authorsFromServer])

async function confirmDelete(id) {
  const result = await Swal.fire({
    title: t('admin.swal.confirm_delete_author'),
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: t('delete'),
    cancelButtonText: t('cancel')
  })

  if (result.isConfirmed) {
    router.delete(`/admin/authors/${id}`, {
      onSuccess: () => {
        authors.value = authors.value.filter(author => author.id !== id)
        Swal.fire(t('admin.swal.author_deleted'), '', 'success')
      }
    })
  }
}
</script>

<template>
  <AdminLayout>

    <Head :title="t('admin.authors_title')" />

    <div class="mb-4 flex justify-between">
      <h1 class="text-2xl font-bold">{{ t('admin.authors_title') }}</h1>
      <Link href="/admin/authors/create" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
      {{ t('admin.create_author') }}
      </Link>
    </div>

    <table class="w-full table-auto border-collapse border border-gray-300">
      <thead>
        <tr class="bg-gray-100">
          <th class="border border-gray-300 px-4 py-2">{{ t('admin.author_id') }}</th>
          <th class="border border-gray-300 px-4 py-2">{{ t('admin.author_name') }}</th>
          <th class="border border-gray-300 px-4 py-2">{{ t('admin.author_biography') }}</th>
          <th class="border border-gray-300 px-4 py-2">{{ t('actions') }}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="author in authors" :key="author.id" class="hover:bg-gray-50">
          <td class="border border-gray-300 px-4 py-2">{{ author.id }}</td>
          <td class="border border-gray-300 px-4 py-2">{{ author.name }}</td>
          <td class="border border-gray-300 px-4 py-2">{{ author.biography }}</td>
          <td class="border border-gray-300 px-4 py-2">
            <Link :href="`/admin/authors/${author.id}/edit`" class="text-blue-600 hover:underline mr-2">
            {{ t('edit') }}
            </Link>
            <button @click="confirmDelete(author.id)" class="text-red-600 hover:underline">
              {{ t('delete') }}
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </AdminLayout>
</template>
