import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/menu.js',
        'resources/js/notification.js',
      ],
      refresh: true
    })
  ]
});