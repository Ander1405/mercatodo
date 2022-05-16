<template>
    <div class="mt-5">
        <canvas id="myChart"/>
    </div>
</template>

<script setup>

import {Chart, registerables} from 'chart.js';
import {onMounted} from "vue";
import axios from "axios";

Chart.register(...registerables)

let values = [];
let data = [];
let config = [];
let myChart = {};
let labels = [];

const getChart = (newData) => {
    data = {
        labels: labels,
        datasets: [{
            label: 'Estados de transacciones',
            backgroundColor: [
                'rgb(231,218,86)',
                'rgb(255,0,0)',
                'rgb(60,236,11)'
            ],
            borderColor: [
                'rgb(0,0,0)',
                'rgb(0,0,0)',
                'rgb(0,0,0)'
            ],
            borderWidth: 1,
            data: newData,
        }],
    }

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
}
onMounted(() => {
        axios.get('/api/chartamortization').then(response => {
            values = Object.values(response.data.data);
            labels = Object.keys(response.data.data);
            getChart(values);
        })
    }
)
</script>
