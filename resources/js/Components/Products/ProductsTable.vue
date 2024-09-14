<template>
    <div>
        <div class="relative overflow-x-auto">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">Product name</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3">Date Created</th>
                        <th scope="col" class="px-6 py-3">Date Updated</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products.data" :key="product.id">
                        <th
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                            {{ product.name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ shortenText(product.description, 100) }}
                        </td>
                        <td class="px-6 py-4">{{ product.price }}</td>
                        <td class="px-6 py-4">
                            {{ formatDate(product.created_at) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ formatDate(product.updated_at) }}
                        </td>
                        <td class="px-6 py-4">
                            <button
                                @click="editProduct(product.product_id)"
                                class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600"
                            >
                                Edit
                            </button>
                            <button
                                @click="deleteProduct(product.product_id)"
                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600 ml-4"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-center">
            <TailwindPagination
                :data="products"
                @pagination-change-page="getData"
            />
        </div>
    </div>
</template>

<script>
import { TailwindPagination } from "laravel-vue-pagination";
import { Inertia } from "@inertiajs/inertia";

export default {
    name: "ProductsTable",
    components: {
        TailwindPagination,
    },
    props: {
        products: Object,
    },
    created() {
        console.log(this.products);
    },
    methods: {
        formatDate(date) {
            const dateString = new Date(date).toLocaleDateString();
            const timeString = new Date(date).toLocaleTimeString();
            return `${dateString} ${timeString}`;
        },
        shortenText(text, length) {
            return text.length > length
                ? text.substring(0, length) + " ..."
                : text;
        },
        getData(page = 1) {
            Inertia.get("/products", { page }, { preserveState: true });
        },
        editProduct(product_id) {
            Inertia.get(`/products/${product_id}/edit`);
        },
        deleteProduct(product_id) {
            if (confirm("Are you sure you want to delete this product?")) {
                Inertia.delete(`/products/${product_id}`);
            }
        },
    },
};
</script>

<style scoped>
/* Your styles here */
</style>
