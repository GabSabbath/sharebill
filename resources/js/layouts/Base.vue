<template>
    <slot> </slot>
</template>

<script setup lang="ts">
import { User } from '@/types';
import { usePage } from '@inertiajs/vue3';
const { user } = defineProps<{
    user: User;
}>();

const page = usePage();
</script>
