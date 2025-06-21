<script setup lang="ts">
import type { TableColumn } from "@nuxt/ui";

definePageMeta({
  layout: "admin",
  middleware: "auth",
});

const { $api } = useNuxtApp();
const isLoading = ref<boolean>(false);
const pagination = ref<API.Common.PaginatingCommonParams>()
const items = ref<API.Contacts.Contact[]>([]);
const columns: TableColumn<API.Contacts.Contact>[] = [
  {
   
    id: "name",
  },
  {
    id: "content"
  },
  {
    id: "date",
  }
];

onBeforeMount(() => {
  getContactUsData();
});

async function getContactUsData(page: number = 1) {
  isLoading.value = true;
  try {
    const { data, meta } = await $api<API.Contacts.ContactList>("/contacts", {
      method: "GET",
      params: {
        page: page,
        per_page: 10,
      },
    });

    items.value = data || [];
    pagination.value = meta;
  } catch (error) {
    console.error("Error fetching contact us data:", error);
  } finally {
    isLoading.value = false;
  }
}

</script>

<template>
  <main class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
    <p>Welcome to the admin dashboard. Here you can manage your application.</p>
    <button
      class="mt-4 px-4 py-2 bg-blue-500 text-white rounded"
      @click="getContactUsData"
    >
      Refresh Contact Us Data
    </button>
    <UTable :data="items" :columns="columns" :loading="isLoading"  class="max-w-screen w-full">
        <template #name-cell="{ row }">
            <span class="font-semibold text-black">{{ row.original.name }}</span>
        </template>
        <template #content-cell="{ row }">
            <p>
                <span class="text-black font-semibold"> {{ row.original.subject }} </span>
                <span> - {{ row.original.message }} </span>
            </p>
        </template>
        <template #date-cell="{ row }">
            <p class="text-black font-semibold">{{ row.original.submitted_at }}</p>
        </template>
    </UTable>

    <div class="flex justify-center border-t border-default pt-4">
      <UPagination
          :default-page="pagination?.current_page || 1"
          :items-per-page="pagination?.per_page"
          :total="pagination?.total"
          @update:page="args => {
            getContactUsData(args)
          }"
      />
    </div>
  </main>
</template>
