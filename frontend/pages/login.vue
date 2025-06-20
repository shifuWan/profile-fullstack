<script setup lang="ts">
import * as z from "zod";
import type { FormSubmitEvent } from "@nuxt/ui";

definePageMeta({
  layout: false,
  middleware: "guest",
});

const schema = z.object({
  username: z.string().optional(),
  password: z.string().optional(),
});

type Schema = z.output<typeof schema>;

const state = reactive<Partial<Schema>>({
  username: undefined,
  password: undefined,
});

const isLoading = ref<boolean>(false);

const { $api } = useNuxtApp();
const toast = useToast();
async function onSubmit(event: FormSubmitEvent<Schema>) {
  event.preventDefault();
  isLoading.value = true;
  try {
    const { data } = await $api<API.Auth.TokenResponse>("login", {
      method: "POST",
      body: event.data,
    });

    // localStorage.setItem("nuxt-token", data.token || "");
    useCookie("nuxt-token", {
      maxAge: 60 * 60 * 24 * 7, // 7 days
      httpOnly: false,
    }).value = data.token || "";
    await navigateTo("/admin/dashboard");
  } catch (error) {
    console.error("Login failed:", error);
    toast.add({
      title: "Error",
      description: "Login failed. Please check your credentials.",
      color: "error",
    });
  } finally {
    isLoading.value = false;
  }
}
</script>

<template>
  <UApp>
    <main class="flex items-center justify-center min-h-screen bg-gray-50">
      <UCard class="w-full max-w-md p-6 shadow-lg">
        <template #header>
          <h1 class="text-2xl font-bold">Sign in to dashboard</h1>
        </template>

        <UForm
          :schema="schema"
          :state="state"
          class="space-y-4"
          @submit="onSubmit"
        >
          <UFormField label="Username" name="username">
            <UInput v-model="state.username" class="w-full" size="xl" />
          </UFormField>

          <UFormField label="Password" name="password">
            <UInput
              v-model="state.password"
              type="password"
              class="w-full"
              size="xl"
            />
          </UFormField>

          <UButton
            type="submit"
            class="flex justify-center gap-2 items-center w-full"
            color="neutral"
            size="xl"
            :loading="isLoading"
          >
            Sign In
          </UButton>
        </UForm>
      </UCard>
    </main>
  </UApp>
</template>

<style lang="scss" scoped></style>
