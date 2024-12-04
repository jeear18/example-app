<template>
    <div class="flex h-screen">
      <!-- Sidebar -->
      <aside
        :class="[
          'fixed inset-y-0 z-20 w-64 bg-gray-800 text-white transform transition-transform duration-300',
          sidebarOpen ? 'translate-x-0' : '-translate-x-full',
          'lg:translate-x-0 lg:relative lg:flex-shrink-0',
        ]"
      >
        <div class="p-4 font-bold text-lg border-b border-gray-700">
          My App
        </div>
        <nav class="mt-4">
          <ul>
            <li class="hover:bg-gray-700">
                <Link :href="route('main')" >
                    <a href="#" class="block px-4 py-2">Dashboard</a>
                </Link>

            </li>
            <li class="hover:bg-gray-700">
                <Link :href="route('tables')" >
                    <a href="#" class="block px-4 py-2">Tables</a>
                </Link>
            </li>
            <li class="hover:bg-gray-700">
              <a href="#" class="block px-4 py-2">Settings</a>
            </li>
            <li class="hover:bg-gray-700">
              <a href="#" class="block px-4 py-2">Logout</a>
            </li>
          </ul>
        </nav>
      </aside>

      <!-- Overlay for small screens -->
      <div
        v-if="sidebarOpen"
        class="fixed inset-0 z-10 bg-black bg-opacity-50 lg:hidden"
        @click="toggleSidebar"
      ></div>

      <!-- Main Content -->
      <div class="flex flex-col flex-1">
        <!-- Header -->
        <header class="bg-gray-100 border-b border-gray-200 p-4 flex justify-between items-center">
          <button
            @click="toggleSidebar"
            class="lg:hidden p-2 text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-400 rounded-md"
          >
            <!-- Menu Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
          </button>
          <h1 class="text-xl font-semibold">Dashboard</h1>
        </header>
        <!-- Page Content -->
        <main class="p-6 flex-1 bg-gray-50">
          <slot />
        </main>
      </div>
    </div>
  </template>

<script setup>
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';

const sidebarOpen = ref(false);

const toggleSidebar = () => {
  sidebarOpen.value = !sidebarOpen.value;
};
</script>

