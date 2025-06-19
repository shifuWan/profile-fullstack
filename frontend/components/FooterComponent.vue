<template>
    <div>
        <footer class="bg-slate-50 mt-8">
            <div class="container mx-auto px-4 py-6 text-center">
                <p class="text-gray-600 font-itim text-lg">
                    &copy; {{ getCurrentYear() }} My Portfolio. All rights reserved.
                </p>
                <p class="text-gray-500 font-itim text-sm">
                    Built with Nuxt.js and Tailwind CSS
                </p>
            </div>
        </footer>
    </div>
</template>

<script lang="ts" setup>
function getCurrentYear() {
    return new Date().getFullYear();
}
</script>

<style lang="scss" scoped>


</style>