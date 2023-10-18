<template>
  <div class="flex bg-gray-100">
    <NavigationBar></NavigationBar>

    <div class="m-8 flex-grow">
        <h1 class="font-bold text-4xl mb-1">Good Morning, {{$page.props.auth.user.name}}</h1>
        <p class="text-sm text-gray-500 mb-8">General data on the clinics progress</p>
        <div class="flex space-x-10">
            <AnalyticsCard title="Accepted programations" count="123" percentage="100%" link="/dashboard" button-text="Check programations" class="flex-1"></AnalyticsCard>
            <AnalyticsCard title="Accepted programations" count="123" percentage="100%" link="/dashboard" button-text="Check programations" class="flex-1"></AnalyticsCard>
            <AnalyticsCard title="Accepted programations" count="123" percentage="100%" link="/dashboard" button-text="Check programations" class="flex-1"></AnalyticsCard>
        </div>
        <div class="flex space-x-10 mt-8">
            <BarChartCard class="flex-2"></BarChartCard>
            <NextProgramationCard class="flex-1"></NextProgramationCard>
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
