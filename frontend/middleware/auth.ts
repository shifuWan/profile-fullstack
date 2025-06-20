export default defineNuxtRouteMiddleware(async (_to, _from) => {
    const token =  useCookie("nuxt-token").value;
    if (!token) {
        // If no token is found, redirect to login
        return await navigateTo("/login");
    } 
})