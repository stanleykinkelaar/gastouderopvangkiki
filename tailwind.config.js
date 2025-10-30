import { defineConfig } from '@tailwindcss/vite'

export default defineConfig({
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/**/*.php",
    "./vendor/livewire/**/*.php",
    "./vendor/livewire/flux/stubs/resources/views/**/*.blade.php",
  ],
})