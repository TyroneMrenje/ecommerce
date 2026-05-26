import { createInertiaApp } from '@inertiajs/react';
import '../css/app.css';
import '@fontsource-variable/outfit/wght.css';
import '@fontsource-variable/jetbrains-mono/wght.css';
import '@fontsource/caveat-brush';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    progress: {
        color: '#4B5563',
        delay: 200,
        showSpinner:false
    },
});
