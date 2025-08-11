<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import Checkbox from '@/Components/Checkbox.vue';
import Modal from '@/Components/Modal.vue';

const showModal = ref(false);  // <-- Estado para controlar la visibilidad del modal

const text = ref(''); // Para el v-model del TextInput

</script>

<template>
    <div class="p-8 space-y-8 bg-gray-50 min-h-screen">

        <!-- Logo -->
        <section>
            <div class="mb-8">
                <h2 class="text-xl font-bold mb-4">Logo</h2>
                <ApplicationLogo class="h-12 w-auto" />
            </div>
        </section>

        <!-- Botones -->
        <section>
            <h2 class="text-xl font-bold mb-4">Botones</h2>
            <div class="flex gap-4 flex-wrap">
                <PrimaryButton>Primary Button</PrimaryButton>
                <SecondaryButton>Secondary Button</SecondaryButton>
                <DangerButton>Danger Button</DangerButton>
            </div>
        </section>

        <!-- Dropdown -->
        <section>
            <h2 class="text-xl font-bold mb-4">Dropdown</h2>
            <div class="flex justify-center"> <!-- centrado -->
                <Dropdown align="left">
                    <template #trigger>
                        <PrimaryButton>Selecciona una opción</PrimaryButton>
                    </template>
                    <template #content>
                        <DropdownLink href="/components-preview">Opción 1</DropdownLink>
                        <DropdownLink href="/components-preview">Opción 2</DropdownLink>
                        <DropdownLink href="/components-preview">Opción 3</DropdownLink>
                    </template>
                </Dropdown>
            </div>
        </section>

        <!-- Links de Navegación -->
        <section>
            <h2 class="text-xl font-bold mb-4">NavLink</h2>
            <div class="flex gap-4">
                <NavLink href="/components-preview" :active="true">Activo</NavLink>
                <NavLink href="/components-preview" :active="false">Inactivo</NavLink>
            </div>
        </section>

        <!-- Responsive Nav Links -->
        <section>
            <h2 class="text-xl font-bold mb-4">ResponsiveNavLink</h2>
            <div class="w-64 border rounded">
                <ResponsiveNavLink href="/components-preview" :active="true">Activo</ResponsiveNavLink>
                <ResponsiveNavLink href="/components-preview" :active="false">Inactivo</ResponsiveNavLink>
            </div>
        </section>

        <!-- Inputs -->
        <section>
            <h2 class="text-xl font-bold mb-4">Inputs</h2>
            <div class="space-y-4">
                <div>
                    <InputLabel for="name" value="Nombre" />
                    <TextInput id="name" v-model="text" type="text" autofocus />
                    <InputError message="Este campo es obligatorio" />
                </div>
                <div class="flex items-center gap-2">
                    <Checkbox id="remember" />
                    <InputLabel for="remember" value="Recordarme" />
                </div>
            </div>
        </section>

        <!-- Modal -->
        <section>
            <h2 class="text-xl font-bold mb-4">Modal</h2>
            <PrimaryButton @click="showModal = true">Abrir Modal</PrimaryButton>
            <Modal :show="showModal" @close="showModal = false" maxWidth="lg" closeable>
                <template #default>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Este es el contenido del Modal</h3>
                        <p>Aquí puedes poner lo que quieras, incluso otros componentes.</p>
                        <PrimaryButton @click="showModal = false" class="mt-4">Cerrar</PrimaryButton>
                    </div>
                </template>
            </Modal>
        </section>
        
    </div>
</template>