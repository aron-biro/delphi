<template>
  <div class="flex bg-gray-100">
    <NavigationBar></NavigationBar>

    <div class="m-8">
        <h1 class="font-bold text-4xl mb-1">Good Morning, {{$page.props.auth.user.name}}</h1>
        <p class="text-sm text-gray-500 mb-6">General data on the clinics progress</p>
        <div class=" p-4 rounded-md shadow bg-white"></div>
    </div>
  </div>
</template>

<script setup>
import NavigationBar from "@/Components/NavigarionBar.vue";
</script>
