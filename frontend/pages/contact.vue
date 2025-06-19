<script setup lang="ts">
import * as z from "zod";
import type { FormSubmitEvent } from "@nuxt/ui";

const schema = z.object({
  name: z
    .string()
    .min(1, "Name is required.")
    .max(255, "Name must be less than 255 characters."),
  subject: z
    .string()
    .min(1, "Subject is required.")
    .max(255, "Subject must be less than 255 characters."),
  email: z
    .string()
    .email("Please enter a valid email address.")
    .max(255, "Email must be less than 255 characters."),
  phone: z
    .string()
    .min(1, "Phone number is required.")
    .max(20, "Phone number must be less than 20 characters."),
  message: z.string().min(1, "Message is required."),
});

type Schema = z.output<typeof schema>;

const isLoading = ref(false);
const state = reactive<Partial<Schema>>({
  email: undefined,
  message: undefined,
  name: undefined,
  subject: undefined,
  phone: undefined,
});

const config = useRuntimeConfig();
const toast = useToast();
async function onSubmit(event: FormSubmitEvent<Schema>) {
	try {
		isLoading.value = true;
		 await $fetch(`${config.public.apiBaseUrl}/contacts`, {
			method: "POST",
			body: event.data,
		});
		toast.add({
			title: "Success",
			description: "Your message has been sent successfully.",
			color: "success",
		});
		resetState();
	} catch (error) {
		toast.add({
			title: "Error",
			description: "There was an error sending your message.",
			color: "error",
		});
		console.error("Error submitting contact form:", error);
	} finally {
		isLoading.value = false;
	}
}

function resetState() {
	state.email = undefined;
	state.message = undefined;
	state.name = undefined;
	state.subject = undefined;
	state.phone = undefined;
}
</script>

<template>
  <SectionPage id="contact" class="bg-white">
    <h2 class="font-itim text-3xl font-bold mb-6">Contact Me</h2>
    <p class="text-lg mb-4">
      If you have any questions or would like to get in touch, feel free to
      reach out via email or connect with me on social media.
    </p>
    <UForm :schema="schema" :state="state" class="space-y-4" @submit="onSubmit">
      <UFormField label="Email" required name="email" size="xl">
        <UInput
          v-model="state.email"
          placeholder="johndoe@example.com"
          class="w-full md:w-1/2 lg:w-1/3"
        />
      </UFormField>

      <UFormField label="Name" required name="name" size="xl">
        <UInput
          v-model="state.name"
          type="text"
          placeholder="John Doe"
          class="w-full md:w-1/2 lg:w-1/3"
        />
      </UFormField>

      <UFormField label="Subject" required name="subject" size="xl">
        <UInput
          v-model="state.subject"
          type="text"
          placeholder="Your Subject"
          class="w-full md:w-1/2 lg:w-1/3"
        />
      </UFormField>

      <UFormField label="Phone" required name="phone" size="xl">
        <UInput
          v-model="state.phone"
          type="text"
          placeholder="08123456789"
          class="w-full md:w-1/2 lg:w-1/3"
        />
      </UFormField>

      <UFormField label="Message" required name="message" size="xl">
        <UTextarea
          v-model="state.message"
          placeholder="Your message here..."
          class="w-full md:w-1/2 lg:w-1/3"
        />
      </UFormField>

      <UButton type="submit" :loading="isLoading" size="lg">Submit</UButton>
    </UForm>
  </SectionPage>
</template>
