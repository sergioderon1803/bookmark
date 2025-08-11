<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Head, Link, router, usePage } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import Swal from 'sweetalert2'
import { ref } from 'vue'

const { t, locale } = useI18n()
locale.value = usePage().props.locale || 'es'

const { users: usersFromServer, csrf_token } = usePage().props
const users = ref([...usersFromServer])

async function confirmDelete(id) {
  const result = await Swal.fire({
    title: t('admin.swal.confirm_delete_user'),
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: t('delete'),
    cancelButtonText: t('cancel')
  })

  if (result.isConfirmed) {
    router.delete(`/admin/users/${id}`, {
      onSuccess: () => {
        users.value = users.value.filter(user => user.id !== id)
        Swal.fire(t('admin.swal.user_deleted'), '', 'success')
      }
    })
  }
}
</script>

<template>
  <AdminLayout>

    <Head :title="t('admin.users_title')" />

    <div class="mb-4 flex justify-between">
      <h1 class="text-2xl font-bold">{{ t('admin.users_title') }}</h1>
      <Link href="/admin/users/create" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
      {{ t('admin.create_user') }}
      </Link>
    </div>

    <table class="w-full table-auto border-collapse border border-gray-300">
      <thead>
        <tr class="bg-gray-100">
          <th class="border border-gray-300 px-4 py-2">{{ t('admin.user_id') }}</th>
          <th class="border border-gray-300 px-4 py-2">{{ t('admin.user_name') }}</th>
          <th class="border border-gray-300 px-4 py-2">{{ t('admin.user_email') }}</th>
          <th class="border border-gray-300 px-4 py-2">{{ t('admin.user_role') }}</th>
          <th class="border border-gray-300 px-4 py-2">{{ t('actions') }}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id" class="hover:bg-gray-50">
          <td class="border border-gray-300 px-4 py-2">{{ user.id }}</td>
          <td class="border border-gray-300 px-4 py-2">{{ user.name }}</td>
          <td class="border border-gray-300 px-4 py-2">{{ user.email }}</td>
          <td class="border border-gray-300 px-4 py-2">{{ user.role }}</td>
          <td class="border border-gray-300 px-4 py-2">
            <Link :href="`/admin/users/${user.id}/edit`" class="text-blue-600 hover:underline mr-2">
            {{ t('edit') }}
            </Link>
            <button @click="confirmDelete(user.id)" class="text-red-600 hover:underline">
              {{ t('delete') }}
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </AdminLayout>
</template>
