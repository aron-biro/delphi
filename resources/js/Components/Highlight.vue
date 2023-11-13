<template>
    <span
        class="ml-2 bg-primary-200 text-primary rounded-full text-sm px-2 justify-center h-full"
    >
        {{ text }}
    </span>
</template>

<script setup>
defineProps({
    text: {
        type: String,
        required: true,
    },
});
</script>
