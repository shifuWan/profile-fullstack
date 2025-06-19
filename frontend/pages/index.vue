<script lang="ts" setup></script>

<template>
  <div>
    <SectionPage id="home">
      <div class="text-center">
        <h1 class="font-itim text-4xl font-bold mb-4">
          Welcome to My Portfolio
        </h1>
        <p class="text-lg mb-6">
          Explore my work, learn about me, and get in touch!
        </p>
        <NuxtLink
          to="/contact"
          class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition-colors"
        >
          Contact Me
        </NuxtLink>
      </div>
    </SectionPage>

    <SectionPage id="work" class="bg-white">
        <h2 class="font-itim text-3xl font-bold mb-6">My Work</h2>
        <p class="text-lg mb-4">
          Here are some of the projects I've worked on:
        </p>
        <ul class="list-disc pl-6 space-y-2">
          <li class="text-lg">
            Project 1: A web application for managing tasks
          </li>
          <li class="text-lg">
            Project 2: An e-commerce site built with Nuxt.js
          </li>
          <li class="text-lg">Project 3: A personal blog using Markdown</li>
        </ul>
    </SectionPage>

    <SectionPage id="about">
        <h2 class="font-itim text-3xl font-bold mb-6">About Me</h2>
        <p class="text-lg mb-4">
          I am a passionate web developer with experience in building modern web
          applications. I love creating user-friendly interfaces and writing
          clean, maintainable code.
        </p>
        <p class="text-lg mb-4">
          In my free time, I enjoy learning new technologies, contributing to
          open-source projects, and writing technical articles.
        </p>
        <NuxtLink
          to="#blog"
          class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition-colors"
        >
          Read My Blog
        </NuxtLink>
    </SectionPage>

    <SectionPage id="blog" class="bg-white">
      <h2 class="font-itim text-3xl font-bold mb-6">Blog</h2>
      <p class="text-lg mb-4">
        Check out my latest blog posts where I share insights on web
        development, tutorials, and more.
      </p>
      <ul class="list-disc pl-6 space-y-2">
        <li class="text-lg">Understanding Vue.js and Nuxt.js</li>
        <li class="text-lg">Building Responsive Web Applications</li>
        <li class="text-lg">Tips for Writing Clean Code</li>
      </ul>
    </SectionPage>
  </div>
</template>
