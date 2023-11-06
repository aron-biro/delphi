<template>
    <div class="flex bg-white border border-gray-300 rounded-md hover:shadow">
        <div class="flex flex-row items-center ml-2 w-full">
            <SearchIcon></SearchIcon>
            <input
                v-model="searchQuery"
                class="border-0 focus:outline-none focus:ring-0 rounded-md w-full"
                placeholder="Search"
            />
        </div>
    </div>
</template>

<script setup>
import SearchIcon from "@/Components/Icons/SearchIcon.vue";
import { computed } from "vue";
const props = defineProps({
    modelValue: {
        type: String,
        required: true,
    },
});

const emits = defineEmits(["update:modelValue"]);

const searchQuery = computed({
    get: () => props.modelValue,
    set: (value) => emits("update:modelValue", value),
});
</script>
