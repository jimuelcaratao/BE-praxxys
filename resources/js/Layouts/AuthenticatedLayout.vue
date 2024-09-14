<script setup>
import Navbar from "@/Components/Dashboard/Navbar.vue";
import Sidebar from "@/Components/Dashboard/Sidebar.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <Navbar />
    <Sidebar />

    <div class="p-4 md:ml-64 lg:ml-4">
        <!-- Page Content -->
        <main>
            <slot />
        </main>
    </div>
</template>
