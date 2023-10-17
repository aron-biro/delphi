<template>
    <div class="w-1/6 h-screen bg-white shadow-md min-w-[200px] pl-6 pt-6 flex flex-col">
        <ApplicationLogo text-color="primary" text-size="5xl"></ApplicationLogo>
        <Search class="mt-3"></Search>
        <div class="flex-grow">
            <div class="flex flex-col items-start">
                <div class="flex mt-4 space-x-4"><Home></Home><a href="/dashboard" @click="setActiveButton('general')">General</a></div>
                <div class="flex mt-3 space-x-4"><Calendar></Calendar><a href="/dashboard" @click="setActiveButton('programations')">Programations</a></div>
                <div class="flex mt-3 space-x-4"><Patients></Patients><a href="/dashboard" @click="setActiveButton('patients')">Patients</a></div>
                <div class="flex mt-3 space-x-4"><Stethoscope></Stethoscope><a href="/dashboard" @click="setActiveButton('stethoscpe')">Services</a></div>
                <div class="flex mt-3 space-x-4"><Doctor></Doctor><a href="/dashboard" @click="setActiveButton('doctor')">Doctors</a></div>
                <div class="flex mt-3 space-x-4"><Statistics></Statistics><a href="/dashboard" @click="setActiveButton('statistics')">Statistics</a></div>
            </div>
        </div>
        <div class="flex items-center mb-6 space-x-4"><Settings></Settings><a href="/settings" @click="setActiveButton('general')">Settings</a></div>
    </div>
</template>

<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Search from "@/Components/SearchBar.vue";
import Home from "@/Components/Icons/Home.vue";
import Patients from "@/Components/Icons/Patients.vue";
import Stethoscope from "@/Components/Icons/Stethoscope.vue";
import Doctor from "@/Components/Icons/Doctor.vue";
import Statistics from "@/Components/Icons/Statistics.vue";
import Calendar from "@/Components/Icons/Calendar.vue";
import {ref} from "vue";
import Settings from "@/Components/Icons/Settings.vue";

const activeButton = ref("general");


function setActiveButton(newActiveButton) {
  activeButton.value = newActiveButton
  console.log(activeButton.value);
}
</script>
