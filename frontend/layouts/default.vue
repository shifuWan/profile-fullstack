<script setup lang="ts"></script>

<template>
  <UApp>
    <div class="flex flex-col min-h-screen">
        <NavigationBar />
        <main class="flex-1 mt-16">
            <slot />
        </main>
        <Footer />
    </div>
  </UApp>
</template>

<style scoped></style>
