// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  ssr: false,
  devtools: { enabled: true },

  modules: [
      "@nuxtjs/tailwindcss",
      "@pinia/nuxt",
	  'nuxt-icons'
  ],

  app: {
      head: {
          bodyAttrs: {
              class: "bg-zinc-950 text-white font-semibold font-mono"
          }
      }
  },

  compatibilityDate: "2024-07-19",
})