<template>
    <Form class="section-box" :action="`/users/${user.id}`" method="patch">
        {{ form.errors }}
        <div>
            <button v-if="canEdit" @click="() => (isEditting = !isEditting)">
                {{ isEditting ? 'Stop editting' : '️Edit' }}
                <text v-if="form.isDirty">...</text>
            </button>
        </div>
        <div>
            <text v-if="form.hasErrors" class="bg-red-900">{{
                form.errors.name
            }}</text>
            <input v-if="isEditting" name="name" v-model="form.name" />
            <text v-else>{{ form.name }}</text>
        </div>
    </Form>
</template>

<script setup lang="ts">
import type { User } from '@/types';
import { Form, useForm } from '@inertiajs/vue3';
import { useDebounceFn } from '@vueuse/core';
import { ref, watch } from 'vue';

const isEditting = ref<boolean>(false);

const { user, canEdit = false } = defineProps<{
    user: User;
    canEdit: boolean;
}>();

const form = useForm({
    name: user.name,
});

const userModel = ref(JSON.parse(JSON.stringify(user)));

console.log(userModel);

const update = useDebounceFn(() => {
    form.patch(`/users/${user.id}`);
}, 1000);

watch(
    form,
    (newVal) => {
        if (!newVal) return;
        update();
    },
    { deep: true },
);
</script>
