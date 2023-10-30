<template>
    <div class="flex bg-gray-100">
        <NavigationBar></NavigationBar>
        <div class="w-1/6 min-w-[210px] h-screen"></div>
        <div class="m-8 flex-grow">
            <h1 class="font-bold text-4xl mb-1">
                Good Morning, {{ $page.props.auth.user.name }}
            </h1>
            <p class="text-gray-500 mb-8">
                General data on the clinics progress
            </p>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-12">
                <AnalyticsCard
                    title="Accepted programations"
                    count="123"
                    percentage="100%"
                    link="/dashboard"
                    button-text="Check programations"
                ></AnalyticsCard>
                <AnalyticsCard
                    title="Accepted programations"
                    count="123"
                    percentage="100%"
                    link="/dashboard"
                    button-text="Check programations"
                ></AnalyticsCard>
                <AnalyticsCard
                    title="Accepted programations"
                    count="123"
                    percentage="100%"
                    link="/dashboard"
                    button-text="Check programations"
                ></AnalyticsCard>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-12">
                <BarChartCard class="col-span-2"></BarChartCard>
                <NextProgramationCard
                    title="Next programation"
                    date="Tuesday, August 22"
                    time-interval="10:00-11:00"
                    service-type="Blood analysis"
                    patient-name="Ana Maria"
                    link="/dashboard"
                    button-text="See more"
                >
                </NextProgramationCard>
            </div>
            <div class="grid grid-cols-3 gap-12 mb-8">
                <div class="col-span-2">
                    <div class="text-2xl font-bold flex flex-row items-center">
                        Income sources of the clinic
                        <span
                            class="ml-2 bg-primary-200 text-primary rounded-full text-sm px-2 justify-center h-full"
                        >
                            {{ numberOfDoctors }} doctors
                        </span>
                    </div>
                    <div class="text-sm text-gray-500">
                        Monitor the income and progress of the clinic
                    </div>
                </div>
                <SearchBar class="ml-8"></SearchBar>
            </div>
            <BaseTable :specialties="page.props.income"></BaseTable>
        </div>
    </div>
</template>

<script setup>
import NavigationBar from "@/Components/NavigarionBar.vue";
import AnalyticsCard from "@/Components/AnalyticsCard.vue";
import BarChartCard from "@/Components/BarChartCard.vue";
import NextProgramationCard from "@/Components/NextProgramationCard.vue";
import { ref } from "vue";
import SearchBar from "@/Components/SearchBar.vue";
import BaseTable from "@/Components/BaseTable.vue";
import { usePage } from "@inertiajs/vue3";

const numberOfDoctors = ref("7");

const page = usePage();

// console.log(page.props.income);
// console.log(page.props.allAppointments);
</script>
