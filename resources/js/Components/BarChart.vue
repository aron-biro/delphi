<template>
    <canvas id="myChart"></canvas>
</template>

<script setup>
import Chart from 'chart.js/auto';
import {onMounted} from "vue";

const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

const data = {
    labels: labels,
    datasets: [{
        label: 'Programations',
        backgroundColor: '#2970FF',
        data: [42, 10, 5, 24, 20, 30, 45, 23, 19, 60, 53, 11]
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
    }
};

onMounted(() => {
    new Chart(
        document.getElementById('myChart'),
        config
    );
})

</script>
