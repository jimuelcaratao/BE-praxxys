<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ProductsTable from "@/Components/Products/ProductsTable.vue";
import { Head, usePage } from "@inertiajs/vue3";
import { onMounted } from "vue";
import Swal from "sweetalert2";

defineProps({
    products: Object,
});

const page = usePage();

onMounted(() => {
    const flash = page.props.flash || {};

    console.log(flash);

    if (flash.success) {
        Swal.fire({
            title: "Success",
            text: flash.success,
            icon: "success",
            confirmButtonText: "OK",
        });
    }

    if (flash.error) {
        Swal.fire({
            title: "Error",
            text: flash.error,
            icon: "error",
            confirmButtonText: "OK",
        });
    }
});
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <div class="p-4 sm:ml-64">
            <div
                class="p-4 border-2 border-dashed bg-white rounded-lg dark:border-gray-700 mt-14"
            >
                <div class="flex justify-between items-center">
                    <div>
                        <h1
                            class="text-xl font-semibold text-gray-800 dark:text-white"
                        >
                            Products
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Paginate to 10 items per page
                        </p>
                    </div>
                    <button
                        @click="$inertia.visit(route('products.create'))"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                    >
                        Add Product
                    </button>
                </div>

                <div class="mt-4">
                    <ProductsTable :products="products" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    name: "Products",
};
</script>
