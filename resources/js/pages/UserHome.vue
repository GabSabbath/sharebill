<!-- Component for managing user account, home, and categories -->
<template>
    <div class="flex">
        <div class="w-1/4">
            <User :user="user" :canEdit="canEditUser" />
        </div>
        <div class="w-3/4">
            <Home />
        </div>
    </div>
</template>

<script setup lang="ts">
import Home from '@/components/Home.vue';
import User from '@/components/User.vue';
import type { User as UserType } from '@/types';

const { user, canEditUser } = defineProps<{
    user: UserType;
    canEditUser: boolean;
}>();
</script>
