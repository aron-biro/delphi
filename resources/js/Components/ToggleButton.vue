<template>
    <label class="relative inline-flex items-center cursor-pointer">
        <input
            type="checkbox"
            :value="modelValue"
            @click="$emit('update:modelValue', !modelValue)"
            class="sr-only peer"
        />
        <div
            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-2 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"
        ></div>
    </label>
</template>

<script setup>
const props = defineProps({
    modelValue: { type: Boolean, required: true },
});

defineEmits(["update:modelValue"]);
</script>
