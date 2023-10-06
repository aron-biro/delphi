<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="flex">
        <div class="bg-blue-500 w-1/3"></div>
        <div
            class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 w-2/3"
        >
            <div
                class="sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg w-full"
            >
                <slot />
            </div>
        </div>
    </div>
</template>
