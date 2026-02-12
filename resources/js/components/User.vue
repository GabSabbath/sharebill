<template>
    <Form class="bg-green-950" :action="`/users/${user.id}`" method="patch">
        <div>
            <button
                v-if="canEdit"
                class="rounded-xl bg-blue-900 p-1 text-[1vh] hover:bg-blue-700"
                @click="() => (isEditting = !isEditting)"
            >
                {{ isEditting ? '📄' : '✏️' }}
            </button>
        </div>
        <div>
            <input v-if="isEditting" name="name" />
            <text v-else>{{ userModel.name }}</text>
        </div>
    </Form>
</template>

<script setup lang="ts">
import { User } from '@/types';
import { Form, useFormContext } from '@inertiajs/vue3';
import { useDebounceFn } from '@vueuse/core';
import { ref, watch } from 'vue';

const form = useFormContext();
const isEditting = ref<boolean>(false);

const { user, canEdit = false } = defineProps<{
    user: User;
    canEdit: boolean;
}>();

const userModel = ref(JSON.parse(JSON.stringify(user)));

const update = useDebounceFn((newVal) => {
    console.log(newVal.name);
}, 1000);

watch(
    userModel,
    (newVal) => {
        // Update when it value has stopped changing for 1 second
        update(newVal);
    },
    { deep: true },
);
</script>
