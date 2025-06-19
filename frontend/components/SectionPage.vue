<template>
  <section :id="id" :class="mergedClass">
    <div class="container mx-auto px-4 py-8">
      <slot />
    </div>
  </section>
</template>

<script lang="ts" setup>
import { twMerge } from 'tailwind-merge'

const props = defineProps<{
  id: string
  class?: string
}>()

const defaultClass =
  'bg-slate-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100'

const mergedClass = computed(() => twMerge(defaultClass, props.class))
</script>
