<template>
    <div class="rounded-lg border overflow-hidden">
        <table class="w-full">
            <colgroup>
                <col class="w-1/4" />
                <col class="w-1/4" />
                <col class="w-1/4" />
                <col class="w-1/4" />
            </colgroup>
            <thead>
                <tr
                    class="border-b h-10 bg-gray-150 text-sm text-gray-500 font-normal"
                >
                    <th class="text-left px-6">Speciality</th>
                    <th class="text-left px-6">Nr of programations</th>
                    <th class="text-left px-6">Net income</th>
                    <th class="text-right px-6"></th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <tr
                    class="h-16 border-b"
                    v-for="item in data"
                    :key="item.index"
                >
                    <td class="px-6 font-bold">{{ item.service_name }}</td>
                    <td class="px-6 text-gray-500">
                        {{ item.total_appointments }}
                    </td>
                    <td class="px-6 text-gray-500">
                        {{ item.total_income }} lei
                    </td>
                    <td class="text-right px-6 space-x-4">
                        <button @click="updateItem()">
                            <Pencil></Pencil>
                        </button>
                        <button @click="deleteItem()">
                            <Trash></Trash>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex bg-white py-4 px-6 w-full justify-between">
            <div>Page {{ currentPage }} of {{ maxPage }}</div>
            <div class="flex space-x-4">
                <button @click="previousPage">Previous</button>
                <button @click="nextPage">Next</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, defineProps, ref } from "vue";
import Pencil from "../Components/Icons/Pencil.vue";
import Trash from "../Components/Icons/Trash.vue";

const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
    maxPage: {
        type: Number,
        required: true,
    },
    currentPage: {
        type: Number,
        required: true,
    },
});

const emits = defineEmits(["page"]);

const currentPage = computed({
    get: () => props.currentPage,
    set: (value) => emits("page", value),
});

const itemsPerPage = 10;

function updateItem() {}

function deleteItem() {}

function previousPage() {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
}

function nextPage() {
    if (currentPage.value < props.maxPage) {
        currentPage.value++;
    }
}
</script>
