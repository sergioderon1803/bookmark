<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue';

const props = defineProps({
    align: { type: String, default: 'right' },
    width: { type: String, default: '48' },
    contentClasses: { type: String, default: 'py-1 bg-white dark:bg-gray-800' },
});

const open = ref(false);

const closeOnEscape = (e) => {
    if (open.value && e.key === 'Escape') open.value = false;
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));

const widthClass = computed(() => ({ 48: 'w-48' }[props.width.toString()]));
const alignmentClasses = computed(() => {
    if (props.align === 'left') return 'ltr:origin-top-left rtl:origin-top-right start-0';
    if (props.align === 'right') return 'ltr:origin-top-right rtl:origin-top-left end-0';
    return 'origin-top';
});
</script>

<template>
    <div class="relative">
        <!-- Botón que abre el dropdown -->
        <div @click="open = !open">
            <slot name="trigger" />
        </div>

        <!-- Capa para cerrar haciendo clic fuera -->
        <div v-show="open" class="fixed inset-0 z-40" @click="open = false"></div>

        <!-- Contenido del dropdown -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 scale-95"
            enter-to-class="opacity-100 scale-100" leave-active-class="transition ease-in duration-75"
            leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
            <div v-show="open" class="absolute z-50 mt-2 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5"
                :class="[widthClass, alignmentClasses, contentClasses]" style="display: none">
                <slot name="content" />
            </div>
        </Transition>
    </div>
</template>
