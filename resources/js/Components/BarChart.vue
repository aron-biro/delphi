<template>
    <Bar class="max-h-60" :data="chartData" :options="chartOptions" id="my-chart-id"/>
</template>

<script setup>
import {computed} from 'vue'
import {Bar} from 'vue-chartjs'
import {Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

const props = defineProps({
    chartData: {
        type: Array,
        required: true,
    },
    chartLabels: {
        type: Array,
        required: true,
    },
    unit: {
        type: String,
        required: true,
    },
})

const chartData = computed(() => {
    return {
        labels: props.chartLabels,
        datasets: [
            {
                label: '',
                maxBarThickness: 40,
                backgroundColor: '#2970FF',
                data: props.chartData,
            },
        ],
    }
})

const chartOptions = computed(() => {
    return {
        borderRadius: {
            topLeft: 8,
            topRight: 8,
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: props.unit,
                    padding: {
                        top: 15,
                    },
                },
                grid: {
                    display: false,
                },
            },
            y: {
                stacked: true,
                title: {
                    display: true,
                    text: 'Number of programations',
                    padding: {
                        bottom: 15,
                    },
                },
            },
        },
        plugins: {
            legend: {
                position: 'top',
                align: 'start',
                display: false,
            },
        }
    }
})
</script>
