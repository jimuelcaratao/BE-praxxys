<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { onMounted } from "vue";
import videojs from "video.js";
import "video.js/dist/video-js.css";

const props = defineProps({
    videoUrl: String,
    photoUrl: String,
});
</script>

<template>
    <Head title="Video Player" />

    <AuthenticatedLayout>
        <div class="p-4 sm:ml-64">
            <div
                class="p-4 border-2 bg-white border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14"
            >
                <div>
                    <video
                        id="my-video"
                        class="video-js vjs-big-play-centered vjs-16-9"
                        controls
                        preload="auto"
                        width="640"
                        height="264"
                        :poster="photoUrl"
                        data-setup="{}"
                    >
                        <source :src="videoUrl" type="video/mp4" />
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and
                            consider upgrading to a web browser that
                            <a
                                href="https://videojs.com/html5-video-support/"
                                target="_blank"
                                >supports HTML5 video</a
                            >
                        </p>
                    </video>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
