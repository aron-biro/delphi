<template>
    <canvas class="max-h-80" id="myChart"></canvas>
    {{ chartData }}<br>
    {{ chartLabels }}
</template>

<script setup>
import Chart from 'chart.js/auto';
import {onMounted, ref, watch} from "vue";

const props = defineProps({
    chartData: {
        type: Array,
        required: true,
    },
    chartLabels: {
        type: Array,
        required: true,
    }
});

const chartRef = ref(null);

const data = {
    labels: props.chartLabels,
    datasets: [{
        label: '',
        maxBarThickness: 36,
        backgroundColor: '#2970FF',
        data: props.chartData

    }]
};

const config = {
    type: 'bar',
    data: data,
    options: {
        borderRadius: {
            topLeft: 8,
            topRight: 8,
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Months',
                    padding: {
                        top: 15,
                    },
                },
                grid: {
                    display: false,
                }
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
        },
    }
};

onMounted(() => {
    chartRef.value = new Chart(
        document.getElementById('myChart'),
        config
    );
})

function addData(chart, newLabels, newData) {
    chart.data.labels.push(...newLabels);
    chart.data.datasets[0].data.push(...newData);
    chart.update();
}

function removeData(chart) {
    chart.data.labels = [];
    chart.data.datasets[0].data = [];
    chart.update();
}

function updateData() {
    removeData(chartRef.value);
    addData(chartRef.value, props.chartLabels, props.chartData);
}

watch(props, function (newVal, oldVal) {
    updateData();
});

</script>
