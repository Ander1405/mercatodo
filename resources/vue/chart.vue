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
            label: 'Productos más vendidos por categoria',
            backgroundColor: [
                'rgba(100,238,184,0.89)',
                'rgb(153,102,255)',
                'rgba(196,8,236,0.87)',
                'rgba(229,158,10,0.93)',
                'rgba(255,0,0,0.64)'
            ],
            borderColor: [
                'rgb(0,0,0)',
                'rgb(0,0,0)',
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
        axios.get('/api/chart/bestseller').then(response => {
            values = Object.values(response.data.data);
            labels = Object.keys(response.data.data);
            getChart(values);
        })
    }
)
</script>
