<template>
    <div class="rounded-md shadow bg-white">
        <div class="py-4 px-6">
            <div class="pb-5 text-xl font-bold">Programation statistics</div>
            <ChartButton
                v-for="button in buttons"
                :key="button.title"
                :title="button.title"
                :active="button.title === activeButton"
                @click="setActiveButton(button.title)"
            ></ChartButton>
            <BarChart :chart-data="chartData" :chart-labels="chartLabels" :unit="chartUnit"></BarChart>
        </div>
    </div>
</template>

<script setup>
import BarChart from "@/Components/BarChart.vue";
import ChartButton from "@/Components/ChartButton.vue";
import {ref} from "vue";

const buttons = [
    {title: "12 months"},
    {title: "3 months"},
    {title: "1 month"},
    {title: "7 days"},
    {title: "24 hours"},
];

const activeButton = ref("12 months");

const chartData = ref([]);
const chartLabels = ref([]);
const chartUnit = ref('');

const dataMappings = {
    "12 months": {
        data: [42, 10, 5, 24, 20, 30, 45, 23, 19, 60, 53, 11],
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        unit: 'Months'
    },
    "3 months": {
        data: [60, 53, 11],
        labels: ['Oct', 'Nov', 'Dec'],
        unit: 'Months'
    },
    "1 month": {
        data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
        unit: 'Days'
    },
    "7 days": {
        data: [3, 4, 5, 6, 7, 8, 9, 10],
        labels: ['25', '26', '27', '28', '29', '30', '31'],
        unit: 'Hours'
    },
    "24 hours": {
        data: [1, 1, 1, 1, 2, 3, 4, 2, 2, 4, 3, 2, 3, 4, 5, 6, 2, 1, 4, 2, 1, 2, 3, 4],
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24'],
        unit: 'Hours'
    },
};

setActiveButton("12 months");

function setActiveButton(title) {
    activeButton.value = title;

    if (dataMappings[title]) {
        chartData.value = dataMappings[title].data;
        chartLabels.value = dataMappings[title].labels;
        chartUnit.value = dataMappings[title].unit;
    }
}
</script>
