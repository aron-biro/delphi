<template>
    <div :class="containerClass">
        <div :class="innerCircleClass">
            <component :is="dynamicComponent" :stroke-color="bgColors[customBgColor][2]"/>
        </div>
    </div>
</template>

<script setup>
import {ref, defineProps} from 'vue';
import Growth from '@/Components/Icons/Growth.vue';
import Calendar from '@/Components/Icons/Calendar.vue';

const props = defineProps({
    customBgColor: String,
    customIcon: {
        type: String,
        required: true,
    },
});


const dynamicComponents = {
    Growth,
    Calendar,
};

const bgColors = {
    red: ['bg-red-100', 'bg-red-200', '#D92D20'],
    green: ['bg-green-100', 'bg-green-200', '#12B76A'],
    primary: ['bg-primary-100', 'bg-primary-200', '#2970FF']
};

const dynamicComponent = dynamicComponents[props.customIcon] || dynamicComponents['Growth'];

const containerClass = ref([
    'w-16',
    'h-16',
    'flex',
    'items-center',
    'justify-center',
    'rounded-full',
    bgColors[props.customBgColor][0]
]);

const innerCircleClass = ref([
    'w-12',
    'h-12',
    'flex',
    'items-center',
    'justify-center',
    'rounded-full',
    bgColors[props.customBgColor][1]
]);
</script>
