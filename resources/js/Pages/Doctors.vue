<template>
    <div class="flex bg-gray-100">
        <NavigationBar></NavigationBar>
        <div class="w-1/6 min-w-[210px] h-screen"></div>
        <div class="flex-grow m-8">
            <div class="flex justify-between mb-10 items-ceter">
                <h1 class="font-bold text-4xl">Doctors</h1>
                <button
                    class="text-white bg-primary flex items-center rounded-lg px-3 gap-2"
                >
                    <Plus></Plus>
                    <div>Add doctor</div>
                </button>
            </div>
            <div>
                <div class="grid grid-cols-3 gap-12 mb-8">
                    <div class="col-span-2">
                        <div class="text-2xl flex flex-row items-center">
                            <FilterButton></FilterButton>
                        </div>
                    </div>
                    <SearchBar
                        v-model="search"
                        @update:modelValue="handleSearch"
                        class="ml-8"
                    ></SearchBar>
                </div>
                <DoctorsTable
                    :data="usepage.props.doctors.data"
                    :maxPage="1"
                    :currentPage="1"
                    @page="changePage"
                ></DoctorsTable>
            </div>
        </div>
    </div>
</template>

<script setup>
import DoctorsTable from "@/Components/DoctorsTable.vue";
import NavigationBar from "@/Components/NavigarionBar.vue";
import SearchBar from "@/Components/SearchBar.vue";
import { ref } from "vue";
import Plus from "@/Components/Icons/Plus.vue";
import FilterButton from "@/Components/FilterButton.vue";
import { router, usePage } from "@inertiajs/vue3";

const usepage = usePage();
const search = ref(usepage.props.search);

console.log(usepage.props.doctors.data);

function changePage(page) {
    router.get(
        "/doctors",
        { page, ...(search.value && { search: search.value }) },
        { replace: true, preserveScroll: true }
    );
}

function handleSearch() {}
</script>
