<template>
    <div class="rounded-md shadow bg-white flex flex-col">
        <div class="py-4 px-6 flex-grow">
            <div class="flex justify-between">
                <GrowthIndicator custom-icon="Calendar" custom-bg-color="primary"></GrowthIndicator>
                <Options></Options>
            </div>
            <p class="mt-6 text-gray-600">{{ title }}</p>
            <div class="flex justify-between items-center">
                <h1 class="text-xl ">{{ date }}</h1>
            </div>
            <div class="flex mt-6 space-x-3 align-center">
                <Clock></Clock>
                <p class="text-sm text-gray-600">Between: {{ timeInterval }}</p>
            </div>
            <div class="flex mt-1 space-x-2 align-center">
                <Stethoscope stroke-color="#2970FF"></Stethoscope>
                <p class="text-sm text-gray-600">{{ serviceType }}</p>
            </div>
            <div class="flex mt-1 space-x-3 align-center">
                <Patient></Patient>
                <p class="text-sm text-gray-600">{{ patientName }}</p>
            </div>
        </div>
        <div class="flex justify-end py-4 px-6 border-t-2 w-100 text-primary">
            <Link :href="link">{{ buttonText }}</Link>
        </div>
    </div>
</template>
<script setup>
import GrowthIndicator from "@/Components/GrowthIndicator.vue";
import {Link} from "@inertiajs/vue3";
import UpArrow from "@/Components/Icons/UpArrow.vue";
import Options from "@/Components/Icons/Options.vue";
import Clock from "@/Components/Icons/Clock.vue";
import Stethoscope from "@/Components/Icons/Stethoscope.vue";
import Patient from "@/Components/Icons/Patient.vue";

defineProps({
    title: {
        type: String,
        required: true
    },
    date: {
        type: String,
        required: true
    },
    timeInterval: {
        type: String,
        required: true
    },
    serviceType: {
        type: String,
        required: true
    },
    patientName: {
        type: String,
        required: true
    },
    buttonText: {
        type: String,
        required: true
    },
    link: {
        type: String,
        required: true
    },
});
</script>
