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
                    v-for="specialty in specialties"
                    :key="specialty.index"
                >
                    <td class="px-6 font-bold">{{ specialty.service_name }}</td>
                    <td class="px-6 text-gray-500">
                        {{ specialty.total_appointments }}
                    </td>
                    <td class="px-6 text-gray-500">
                        {{ specialty.total_income }} lei
                    </td>
                    <td class="text-right px-6 space-x-4">
                        <button @click="updateSpecialty()">
                            <Pencil></Pencil>
                        </button>
                        <button @click="deleteSpecialty()">
                            <Trash></Trash>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex bg-white py-4 px-6 w-full justify-between">
            <div>Page {{ currentPage }} of {{ maxPage }}</div>
            <div class="flex space-x-4">
                <button @click="previousPage" :disabled="currentPage === 1">
                    Previous
                </button>
                <button
                    @click="nextPage"
                    :disabled="currentPage * itemsPerPage >= specialties.length"
                >
                    Next
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, defineProps, ref } from "vue";
import Pencil from "../Components/Icons/Pencil.vue";
import Trash from "../Components/Icons/Trash.vue";

const props = defineProps({
    specialties: {
        type: Array,
        required: true,
    },
});

console.log(props.specialties);

const currentPage = ref(1);
const maxPage = ref(10);
const itemsPerPage = 10;

const paginatedSpecialties = computed(() => {
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = currentPage * itemsPerPage;
    return props.specialties.slice(startIndex, endIndex);
});

function updateSpecialty() {}

function deleteSpecialty() {}

function previousPage() {
    if (currentPage > 1) {
        currentPage.value--;
    }
}

function nextPage() {
    if (currentPage * itemsPerPage < props.specialties.length) {
        currentPage.value++;
    }
}
</script>
