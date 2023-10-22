<template>
    <div class="flex bg-gray-100">
        <NavigationBar></NavigationBar>

        <div class="m-8 flex-grow">
            <h1 class="font-bold text-4xl mb-1">Good Morning, {{ $page.props.auth.user.name }}</h1>
            <p class="text-sm text-gray-500 mb-8">General data on the clinics progress</p>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <AnalyticsCard title="Accepted programations" count="123" percentage="100%" link="/dashboard"
                               button-text="Check programations"></AnalyticsCard>
                <AnalyticsCard title="Accepted programations" count="123" percentage="100%" link="/dashboard"
                               button-text="Check programations"></AnalyticsCard>
                <AnalyticsCard title="Accepted programations" count="123" percentage="100%" link="/dashboard"
                               button-text="Check programations"></AnalyticsCard>
            </div>
            <div class="grid grid-cols-3 gap-12 mt-8">
                <BarChartCard class="col-span-2"></BarChartCard>
                <NextProgramationCard title="Next programation" date="Tuesday, August 22" time-interval="10:00-11:00"
                                      service-type="Blood analysis" patient-name="Ana Maria"
                                      link="/dashboard"
                                      button-text="See more"></NextProgramationCard>
            </div>
        </div>
    </div>
</template>

<script setup>
import NavigationBar from "@/Components/NavigarionBar.vue";
import AnalyticsCard from "@/Components/AnalyticsCard.vue";
import BarChartCard from "@/Components/BarChartCard.vue";
import NextProgramationCard from "@/Components/NextProgramationCard.vue";
</script>
