export default defineNuxtRouteMiddleware(async (_to, _from) => {
    const token = useCookie("nuxt-token").value;
    
    if (token) {
        return navigateTo("/admin/dashboard");
    }
})