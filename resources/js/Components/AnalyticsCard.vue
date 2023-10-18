<template>
    <div class="rounded-md shadow bg-white">
        <div class="py-4 px-6">
            <div class="flex justify-between">
                <GrowthIndicator></GrowthIndicator>
                <Options></Options>
            </div>
            <p class="mt-6 text-sm text-gray-600">{{ title }}</p>
            <div class="flex justify-between items-center">
                <h1 class="mt-3 text-3xl font-bold">{{ count }}</h1>
                <div class="flex items-center text-sm py-1 px-2 bg-green-100 rounded-full text-green-800">
                    <UpArrow></UpArrow> {{ percentage }}
                </div>
            </div>
        </div>
        <div class="flex justify-end py-4 px-6 border-t-2 w-100 text-primary">
            <Link :href="link">{{buttonText}}</Link>
        </div>
    </div>
</template>

<script setup>
import Options from "@/Components/Icons/Options.vue";
import GrowthIndicator from "@/Components/GrowthIndicator.vue";
import UpArrow from "@/Components/Icons/UpArrow.vue";
import { Link } from '@inertiajs/vue3';

defineProps({
    title: {
        type: String,
        required: true
    },
    count: {
        type: String,
        required: true
    },
    percentage: {
        type: String,
        required: true
    },
    link: {
        type: String,
        required: true
    },
    buttonText: {
        type: String,
        required: true
    }
});
</script>

