<template>
    <form action="/login" class="grid h-50 place-content-center">
        <label for="email">Email</label>
        <input
            autofocus
            class=""
            placeholder="Email"
            id="email"
            type="email"
            required
        />
        <input id="password" type="password" required />
        <button>LOGIN!</button>
    </form>
</template>
<script setup lang="ts"></script>
