<template>
    <div class="flex bg-gray-100">
        <NavigationBar></NavigationBar>
        <div class="w-1/6 min-w-[210px]"></div>
        <div class="m-8 flex-grow">
            <h1 class="font-bold text-4xl mb-1">Good Morning, {{ $page.props.auth.user.name }}</h1>
            <p class="text-gray-500 mb-8">General data on the clinics progress</p>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <AnalyticsCard title="Accepted programations" count="123" percentage="100%" link="/dashboard"
                               button-text="Check programations"></AnalyticsCard>
                <AnalyticsCard title="Accepted programations" count="123" percentage="100%" link="/dashboard"
                               button-text="Check programations"></AnalyticsCard>
                <AnalyticsCard title="Accepted programations" count="123" percentage="100%" link="/dashboard"
                               button-text="Check programations"></AnalyticsCard>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mt-8">
                <BarChartCard class="col-span-2"></BarChartCard>
                <NextProgramationCard title="Next programation" date="Tuesday, August 22" time-interval="10:00-11:00"
                                      service-type="Blood analysis" patient-name="Ana Maria"
                                      link="/dashboard"
                                      button-text="See more">
                </NextProgramationCard>
            </div>
            <div class="grid grid-cols-3 gap-12 mt-8">
                <div class="col-span-2">
                    <div class="text-2xl font-bold flex flex-row items-center">
                        Income sources of the clinic
                        <span class="ml-2 bg-primary-200 text-primary rounded-full text-sm px-2 justify-center h-full">{{
                                numberOfDoctors
                            }} doctors</span>
                    </div>
                    <div class="text-sm text-gray-500">Monitor the income and progress of the clinic</div>
                </div>
                <SearchBar class="ml-8"></SearchBar>
            </div>
            <div class="rounded-lg border mt-8 overflow-hidden">
                <table class="w-full">
                    <colgroup>
                        <col class="w-1/4">
                        <col class="w-1/4">
                        <col class="w-1/4">
                        <col class="w-1/4">
                    </colgroup>
                    <thead>
                    <tr class="border-b h-10 bg-gray-150 text-sm text-gray-500 font-normal">
                        <th class="text-left px-6">Speciality</th>
                        <th class="text-left px-6">Nr of programations</th>
                        <th class="text-left px-6">Net income</th>
                        <th class="text-right px-6"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    <tr class="h-16 border-b">
                        <td class="px-6 font-bold">Specialty 1</td>
                        <td class="px-6 text-gray-500">Maria Anders</td>
                        <td class="px-6 text-gray-500">Germany</td>
                        <td class="text-right px-6">alma</td>
                    </tr>
                    <tr class="h-16 border-b">
                        <td class="px-6 font-bold">Speciality 2</td>
                        <td class="px-6 text-gray-500">Maria Anders</td>
                        <td class="px-6 text-gray-500">Germany</td>
                        <td class="text-right px-6">alma</td>
                    </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</template>

<script setup>
import NavigationBar from "@/Components/NavigarionBar.vue";
import AnalyticsCard from "@/Components/AnalyticsCard.vue";
import BarChartCard from "@/Components/BarChartCard.vue";
import NextProgramationCard from "@/Components/NextProgramationCard.vue";
import {ref} from "vue";
import SearchBar from "@/Components/SearchBar.vue";

const numberOfDoctors = ref('7')
</script>
