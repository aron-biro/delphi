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
                    :count="usepage.props.currentMonthAppointmentCount"
                    :percentage="appointmetsPercentageDifference"
                    link="/programations"
                    button-text="Check programations"
                ></AnalyticsCard>
                <AnalyticsCard
                    title="Patients"
                    :count="usepage.props.currentMonthUserCount"
                    :percentage="usersPercentageDifference"
                    link="/patients"
                    button-text="Check patients"
                ></AnalyticsCard>
                <AnalyticsCard
                    title="Income"
                    :count="usepage.props.currentMonthTotalIncome"
                    :percentage="incomePercentageDifference"
                    link="/income"
                    button-text="Check income"
                ></AnalyticsCard>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-12 mb-12">
                <BarChartCard class="col-span-2 md:mb-12"></BarChartCard>
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
                            {{ usepage.props.doctorCount }} doctors
                        </span>
                    </div>
                    <div class="text-sm text-gray-500">
                        Monitor the income and progress of the clinic
                    </div>
                </div>
                <SearchBar
                    v-model="search"
                    @update:modelValue="handleSearch"
                    class="ml-8"
                ></SearchBar>
            </div>
            <BaseTable
                :data="usepage.props.income.data"
                :maxPage="usepage.props.income.last_page"
                :currentPage="usepage.props.income.current_page"
                @page="changePage"
            ></BaseTable>
        </div>
    </div>
</template>

<script setup>
import NavigationBar from "@/Components/NavigarionBar.vue";
import AnalyticsCard from "@/Components/AnalyticsCard.vue";
import BarChartCard from "@/Components/BarChartCard.vue";
import NextProgramationCard from "@/Components/NextProgramationCard.vue";
import SearchBar from "@/Components/SearchBar.vue";
import BaseTable from "@/Components/BaseTable.vue";
import { usePage, router } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import { debounce } from "lodash";

const usepage = usePage();
const search = ref(usepage.props.search);
const page = ref(usepage.props.income.current_page);

console.log(usepage.props);
console.log(usepage.props.income.data);

const closestAppointment = computed(() => {
    const currentDateTime = new Date();

    const futureAppointments = usepage.props.appointments.filter(
        (appointment) => {
            return new Date(appointment.appointment_date) > currentDateTime;
        }
    );

    futureAppointments.sort(
        (a, b) => new Date(a.appointment_date) - new Date(b.appointment_date)
    );

    if (futureAppointments.length > 0) {
        return futureAppointments[0];
    } else {
        return null;
    }
});
const incomePercentageDifference = computed(() => {
    if (usepage.props.lastMonthTotalIncome === 0) {
        return 100;
    } else {
        return (
            (usepage.props.currentMonthTotalIncome /
                usepage.props.lastMonthTotalIncome) *
                100 -
            100
        );
    }
});

const appointmetsPercentageDifference = computed(() => {
    if (usepage.props.lastMonthAppointmentCount === 0) {
        return 100;
    } else {
        return (
            (usepage.props.currentMonthAppointmentCount /
                usepage.props.lastMonthAppointmentCount) *
                100 -
            100
        );
    }
});

const usersPercentageDifference = computed(() => {
    if (usepage.props.lastMonthUserCount === 0) {
        return 100;
    } else {
        return (
            (usepage.props.currentMonthUserCount /
                usepage.props.lastMonthUserCount) *
                100 -
            100
        );
    }
});

const changeSearch = debounce((searchSentence) => {
    router.get(
        "/dashboard",
        { page: 1, ...(searchSentence && { search: searchSentence }) },
        { replace: true, preserveScroll: true }
    );
}, 500);

function changePage(page) {
    router.get(
        "/dashboard",
        { page, ...(search.value && { search: search.value }) },
        { replace: true, preserveScroll: true }
    );
}

function handleSearch(searchSentence) {
    changeSearch(searchSentence);
}
</script>
