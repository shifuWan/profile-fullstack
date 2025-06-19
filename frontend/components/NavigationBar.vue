<script setup lang="ts"></script>

<template>
  <header class="bg-white shadow h-16">
    <div class="flex justify-between items-center h-full px-4 container mx-auto">
      <h1 class="font-itim text-2xl font-bold">My Website</h1>
      <nav>
        <ul class="flex gap-4">
          <li>
            <NuxtLink to="/" class="text-blue-500 font-itim text-xl hover:underline"
              >Work</NuxtLink
            >
          </li>
          <li>
            <NuxtLink to="/#about" class="text-blue-500 font-itim text-xl hover:underline"
              >About Me</NuxtLink
            >
          </li>
          <li>
            <NuxtLink to="/#blog" class="text-blue-500 font-itim text-xl hover:underline"
              >Blog</NuxtLink
            >
          </li>
          <li>
            <NuxtLink to="/contact" class="text-blue-500 font-itim text-xl hover:cursor-pointer px-4 py-2 rounded-md bg-blue-100 hover:bg-blue-200"
              >Contact</NuxtLink
            >
          </li>
        </ul>
      </nav>
      <Icon name="mdi:hamburger-menu" class="text-2xl md:hidden" />
    </div>
  </header>
</template>

<style scoped></style>
