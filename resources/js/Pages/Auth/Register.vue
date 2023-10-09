<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import AuthButton from "@/Components/AuthButton.vue";
import TextInput from "@/Components/TextInput.vue";
import ToggleButton from "@/Components/ToggleButton.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Copyright from "@/Components/Icons/Copyright.vue";
import Letter from "@/Components/Icons/Letter.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const form = useForm({
    name: "",
    email: "",
    is_doctor: false,
    password: "",
    password_confirmation: "",
});

const submit = () => {
    console.log("alma");
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <div class="flex">
        <div
            class="bg-primary w-1/3 text-white flex flex-col justify-between p-10"
        >
            <ApplicationLogo />
            <div class="flex justify-between text-sm">
                <div class="flex items-center space-x-2">
                    <p>Dephi 2022</p>
                    <Copyright />
                </div>
                <div class="flex items-center space-x-2">
                    <Letter />
                    <p>help@delphi.com</p>
                </div>
            </div>
        </div>
        <div
            class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 w-2/3"
        >
            <div
                class="sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg w-full"
            >
                <h1
                    class="text-5xl flex flex-col justify-center items-center font-bold my-5"
                >
                    Sign Up
                </h1>

                <form @submit.prevent="submit">
                    <div class="">
                        <InputLabel for="name" value="Name" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password" value="Password" />

                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.password"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            for="password_confirmation"
                            value="Confirm Password"
                        />

                        <TextInput
                            id="password_confirmation"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.password_confirmation"
                        />
                    </div>

                    <div class="mt-4 flex items-center justify-between">
                        <InputLabel>I'm a doctor</InputLabel>
                        <ToggleButton v-model="form.is_doctor"></ToggleButton>
                    </div>

                    <AuthButton
                        class="mt-6 justify-center items-center"
                        :disabled="form.processing"
                    >
                        Register
                    </AuthButton>

                    <AuthButton
                        class="mt-4 justify-center items-center"
                        :disabled="form.processing"
                    >
                        PLACEHOLDER FOR 0AUTH
                    </AuthButton>

                    <div
                        class="mt-4 flex justify-center items-center space-x-2"
                    >
                        <div class="opacity-50">Already have an account?</div>
                        <Link
                            :href="route('login')"
                            class="text-sm text-primary hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                        >
                            Login
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
