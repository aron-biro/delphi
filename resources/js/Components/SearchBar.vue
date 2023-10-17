<template>
  <div class="flex flex-row items-center mr-6 border border-gray-300 rounded-md hover:shadow">
    <SearchIcon class="pl-3 "></SearchIcon>
    <input
        v-model="searchQuery"
        @input="performSearch"
        class="border-0 w-full focus:outline-none focus:ring-0 rounded-md"
        placeholder="Search"
    />
  </div>
</template>

<script setup>
import { ref } from 'vue';
import SearchIcon from "@/Components/Icons/SearchIcon.vue";

const searchQuery = ref('');
const searchResults = ref([]);

function performSearch() {
  searchResults.value = ['Result 1', 'Result 2', 'Result 3'];
}
</script>

