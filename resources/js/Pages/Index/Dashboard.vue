<template>
     <div class="p-4">
            <slot></slot>
            <div
                class="p-4 border-2 border-gray-200 border-dashed rounded-lg"
            >
                <div class="p-6 bg-white shadow rounded-lg mb-5">
                    <h1 class="text-xl font-semibold text-gray-800">
                        User Count
                    </h1>
                    <p class="text-4xl font-bold text-indigo-600 mt-2">
                        {{ userCount }}
                    </p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg">
                    <h1 class="text-xl font-semibold text-gray-800">
                        Names Count
                    </h1>
                    <p class="text-4xl font-bold text-indigo-600 mt-2">
                        {{ nameCount }}
                    </p>
                </div>

            </div>
        </div>
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import { route } from "../../../../vendor/tightenco/ziggy/src/js";
import Container from "@/Pages/UI/Container.vue";
import MainLayout from "@/Pages/Layouts/MainLayout.vue";
import { ref, onMounted } from "vue";
import axios from "axios";

const userCount = ref(0);
const nameCount = ref(0);

const fetchUserCount = async () => {
    try {
        const response = await axios.get("/user-count");
        userCount.value = response.data.count;
    } catch (error) {
        console.error("Error fetching user count:", error);
    }
};

const fetchnameCount = async () => {
    try {
        const response1 = await axios.get("/name-count");
        nameCount.value = response1.data.name_count;
    } catch (error) {
        console.error("Error fetching user count:", error);
    }
};

onMounted(fetchUserCount);
onMounted(fetchnameCount);
</script>
