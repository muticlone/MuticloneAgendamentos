const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .copy('node_modules/@fullcalendar/core/main.min.js', 'public/js/fullcalendar.min.js')
   .copy('node_modules/@fullcalendar/daygrid/main.min.js', 'public/js/daygrid.min.js')
   .copy('node_modules/@fullcalendar/interaction/main.min.js', 'public/js/interaction.min.js')
   .copy('node_modules/@fullcalendar/core/main.min.css', 'public/css/fullcalendar.min.css')
   .copy('path-to-your-sw.js', 'public')
   .version();
