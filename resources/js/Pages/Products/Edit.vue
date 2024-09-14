<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";

const props = defineProps({
    errors: Object,
    product: {
        type: Object,
        required: true,
    },
    photo_url: String,
});

const form = useForm({
    name: props.product.name || "",
    description: props.product.description || "",
    price: props.product.price || "",
    manual_date: props.product.manual_date || "",
    manual_time: props.product.manual_time || "",
    images: props.product.images || [],
});

const handleFileUpload = (event) => {
    form.images = Array.from(event.target.files);
};

const submit = () => {
    router.post(route("products.update", [props.product.product_id]), form);
};

onMounted(() => {
    initFlowbite();

    document
        .getElementById("manual_date")
        .addEventListener("changeDate", (event) => {
            form.manual_date = event.target.value;
        });
});
</script>

<template>
    <Head title="Edit Products" />

    <AuthenticatedLayout>
        <div class="p-4 sm:ml-64">
            <div
                class="p-4 border-2 bg-white border-dashed rounded-lg dark:border-gray-700 mt-14"
            >
                <div class="max-w-md">
                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <label
                                for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Product Name</label
                            >
                            <input
                                type="text"
                                id="name"
                                v-model="form.name"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            />

                            <InputError class="mt-2" :message="errors.name" />
                        </div>

                        <div class="mb-4">
                            <label
                                for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Description</label
                            >
                            <input
                                type="text"
                                id="description"
                                v-model="form.description"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            />

                            <InputError
                                class="mt-2"
                                :message="errors.description"
                            />
                        </div>

                        <div class="mb-4">
                            <label
                                for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Price</label
                            >
                            <input
                                type="number"
                                id="price"
                                v-model="form.price"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            />

                            <InputError class="mt-2" :message="errors.price" />
                        </div>

                        <div class="mb-4">
                            <label
                                for="manual_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Select date:</label
                            >
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                                >
                                    <svg
                                        class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                                        />
                                    </svg>
                                </div>
                                <input
                                    datepicker
                                    id="manual_date"
                                    name="manual_date"
                                    v-model="form.manual_date"
                                    datepicker-format="yyyy-mm-dd"
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date"
                                    value="2024-09-14"
                                    required
                                />
                            </div>
                            <InputError
                                class="mt-2"
                                :message="errors.manual_date"
                            />
                        </div>

                        <div class="mb-4">
                            <label
                                for="time"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Select time:</label
                            >
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none"
                                >
                                    <svg
                                        class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                                <input
                                    type="time"
                                    id="time"
                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required
                                    v-model="form.manual_time"
                                />
                            </div>
                            <InputError
                                class="mt-2"
                                :message="errors.manual_time"
                            />
                        </div>
                        <div class="mb-4">
                            <div
                                v-if="form.images.length > 0"
                                class="mt-4 mb-4"
                            >
                                <h3
                                    class="text-lg font-medium text-gray-900 dark:text-white"
                                >
                                    Uploaded Images:
                                </h3>
                                <div class="grid grid-cols-3 gap-4 mt-2">
                                    <div
                                        v-for="(image, index) in form.images"
                                        :key="index"
                                        class="relative"
                                    >
                                        <img
                                            :src="
                                                props.photo_url +
                                                '/' +
                                                image.directory
                                            "
                                            alt="Uploaded Image"
                                            class="w-full h-auto rounded-lg"
                                        />
                                    </div>
                                </div>
                            </div>

                            <label
                                for="images"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Images (If has data it will replace old
                                images)</label
                            >
                            <input
                                id="images"
                                type="file"
                                multiple
                                accept="image/jpg, image/jpeg, image/png"
                                @change="handleFileUpload"
                            />

                            <InputError class="mt-2" :message="errors.images" />
                        </div>

                        <div class="mt-4 flex justify-between">
                            <Link :href="route('products.index')">
                                <button
                                    type="button"
                                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-700"
                                >
                                    Go Back
                                </button>
                            </Link>
                            <button
                                type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700"
                            >
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
