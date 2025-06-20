export default defineNuxtPlugin((nuxtApp) => {
	const config = useRuntimeConfig();

  const api = $fetch.create({
    baseURL: config.public.apiBaseUrl || "http://localhost:3000/",
    onRequest({ options }) {
			const token = useCookie("nuxt-token").value; 
      if (token) {
        options.headers.set("Authorization", `Bearer ${token}`);
      }
      options.headers.set("Accept", "application/json");
      options.headers.set("Content-Type", "application/json");
    },
    async onResponseError({ response }) {
      useCookie("nuxt-token", {
        maxAge: 0,
      }).value = ""; // Clear token cookie
      if (response.status === 401) {
        await nuxtApp.runWithContext(() => navigateTo("/login"));
      }
    },
  });

  return {
    provide: {
      api,
    },
  };
});
