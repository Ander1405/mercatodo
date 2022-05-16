require('./bootstrap');

import { createApp } from 'vue';

import chart from "../vue/chart.vue";
import ChartAmortization from "../vue/ChartAmortization"

createApp(chart).mount('#chart');
createApp(ChartAmortization).mount('#ChartAmortization');




