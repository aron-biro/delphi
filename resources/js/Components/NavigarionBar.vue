<template>
    <div
        class="w-1/6 h-screen bg-white shadow-md min-w-[210px] pl-6 pt-6 flex flex-col fixed"
    >
        <ApplicationLogo text-color="primary" text-size="5xl"></ApplicationLogo>
        <Search class="mt-3 mr-6" model-value=""> </Search>
        <div class="flex-grow">
            <div class="flex flex-col items-start">
                <div class="flex mt-4 space-x-4">
                    <Home></Home>
                    <Link href="/general" @click="setActiveButton('general')"
                        >General</Link
                    >
                </div>
                <div class="flex mt-3 space-x-4">
                    <Calendar stroke-color="#667085"></Calendar>
                    <Link
                        href="/programations"
                        @click="setActiveButton('programations')"
                        >Programations</Link
                    >
                </div>
                <div class="flex mt-3 space-x-4">
                    <Patients></Patients>
                    <Link href="/patients" @click="setActiveButton('patients')"
                        >Patients</Link
                    >
                </div>
                <div class="flex mt-3 space-x-4">
                    <Stethoscope stroke-color="#667085"></Stethoscope>
                    <Link href="/services" @click="setActiveButton('services')"
                        >Services</Link
                    >
                </div>
                <div class="flex mt-3 space-x-4">
                    <Doctor></Doctor>
                    <a href="/doctors" @click="setActiveButton('doctors')"
                        >Doctors</a
                    >
                </div>
                <div class="flex mt-3 space-x-4">
                    <Statistics></Statistics>
                    <Link
                        href="/statistics"
                        @click="setActiveButton('statistics')"
                        >Statistics</Link
                    >
                </div>
            </div>
        </div>
        <div class="flex items-center mb-4 space-x-4">
            <Settings></Settings>
            <Link href="/settings" @click="setActiveButton('general')"
                >Settings</Link
            >
        </div>
        <div class="flex justify-between border-t border-gray pt-3 mr-6">
            <div class="flex flex-col pb-8 ml-4">
                <div>
                    {{ $page.props.auth.user.name }}
                </div>
                <div class="text-gray-600 text-sm">
                    {{ $page.props.auth.user.email }}
                </div>
            </div>
            <Link href="/logout" method="post" as="button" class="flex">
                <Logout></Logout>
            </Link>
        </div>
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
import { ref } from "vue";
import Settings from "@/Components/Icons/Settings.vue";
import { Link } from "@inertiajs/vue3";
import Logout from "@/Components/Icons/Logout.vue";

const activeButton = ref("general");

function setActiveButton(newActiveButton) {
    activeButton.value = newActiveButton;
    console.log(activeButton.value);
}
</script>
