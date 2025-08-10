<script setup>
import { Head, Link, router, usePage } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import { ref } from 'vue'
import Swal from 'sweetalert2'

const { users: usersFromServer, csrf_token } = usePage().props
const users = ref([...usersFromServer])

const { t, locale } = useI18n()
locale.value = usePage().props.locale || 'es'

async function confirmDelete(id) {
  const result = await Swal.fire({
    title: t('admin.swal.confirm_delete_user'),
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: t('admin.swal.delete'),
    cancelButtonText: t('admin.swal.cancel')
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

  <Head :title="t('admin.users_title')" />
  <div class="p-6 max-w-6xl mx-auto">

    <!-- Botón para volver al dashboard -->
    <Link href="/dashboard" class="mb-4 inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
    ← {{ t('admin.back_to_dashboard') }}
    </Link>

    <h1 class="text-2xl font-bold mb-4">{{ t('admin.users_title') }}</h1>
    <Link href="/admin/users/create"
      class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    {{ t('admin.create_user') }}
    </Link>

    <table class="w-full table-auto border-collapse border border-gray-300">
      <thead>
        <tr class="bg-gray-100">
          <th class="border border-gray-300 px-4 py-2">{{ t('admin.user_name') }}</th>
          <th class="border border-gray-300 px-4 py-2">{{ t('admin.user_email') }}</th>
          <th class="border border-gray-300 px-4 py-2">{{ t('admin.user_role') }}</th>
          <th class="border border-gray-300 px-4 py-2">{{ t('admin.actions') }}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id" class="hover:bg-gray-50">
          <td class="border border-gray-300 px-4 py-2">{{ user.name }}</td>
          <td class="border border-gray-300 px-4 py-2">{{ user.email }}</td>
          <td class="border border-gray-300 px-4 py-2">{{ user.role }}</td>
          <td class="border border-gray-300 px-4 py-2">
            <Link :href="`/admin/users/${user.id}/edit`" class="text-blue-600 hover:underline mr-2">{{ t('admin.edit')
            }}</Link>
            <form @submit.prevent="confirmDelete(user.id)" class="inline">
              <input type="hidden" name="_method" value="DELETE" />
              <input type="hidden" name="_token" :value="csrf_token" />
              <button type="submit" class="text-red-600 hover:underline">{{ t('admin.delete') }}</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
