<template>
    <button
        class="m-1 p-2 rounded-lg"
        :class="buttonClasses"
    >
        {{ title }}
    </button>
</template>

<script setup>
import {computed} from "vue";

const props = defineProps({
    title: {
        type: String,
        required: true
    },
    active: Boolean
});

const buttonClasses = computed(function () {
    return {
        'bg-gray-100': props.active,
        'text-primary': props.active,
        'text-gray-600': !props.active
    };
});
</script>
