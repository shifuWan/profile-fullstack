<script setup lang="ts">
const isOpen = ref<boolean>(false);

const toggleMenu = () => {
  isOpen.value = !isOpen.value;
};
</script>

<template>
  <header class="bg-white h-16 fixed w-full" >
    <div class="flex justify-between items-center h-full px-4 container mx-auto">
      <h1 class="font-itim text-2xl font-bold">My Website</h1>
      <nav :class="['absolute md:static top-16 left-0 right-0 bg-white md:bg-transparent md:shadow-none z-10 overflow-hidden h-0 md:h-full transition-all duration-300 ease-in-out', isOpen ? 'h-auto' : '']">
        <ul class="flex gap-4 flex-col md:flex-row md:items-center md:gap-8 p-4 md:p-0 h-full">
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
      <Icon name="mdi:hamburger-menu" class="text-2xl md:hidden" @click="toggleMenu"/>
    </div>
  </header>
</template>

<style scoped></style>
