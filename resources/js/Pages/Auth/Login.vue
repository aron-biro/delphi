<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import AuthButton from "@/Components/AuthButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm } from "@inertiajs/vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Copyright from "@/Components/Icons/Copyright.vue";
import Letter from "@/Components/Icons/Letter.vue";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <div class="flex">
        <div class="bg-primary w-1/3 text-white flex flex-col justify-between p-10">
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
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 w-2/3">
            <div class="sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg w-full">
                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">{{ status }}</div>

                <h1 class="text-5xl flex flex-col justify-center items-center font-bold my-5">Login</h1>

                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" value="Email" />
                        <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                required
                                autofocus
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
                                autocomplete="current-password"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="flex items-center justify-end mt-4 flex-col">

                        <AuthButton
                                class="my-6 flex justify-center items-center"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                        >
                            Log in
                        </AuthButton>

                            <a href="auth/google">Login with Google</a>


                        <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="text-sm text-primary hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                        >
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
