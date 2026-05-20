<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', config('app.name', 'Laravel Admin'))
    </title>

    <script>
        (function () {
            const theme = localStorage.getItem('theme');

            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            }

            if (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800 antialiased dark:bg-gray-950 dark:text-gray-200">

    <div class="flex min-h-screen bg-gray-50 dark:bg-gray-950">

        @include('components.admin.sidebar')

        <div class="flex min-h-screen flex-1 flex-col bg-gray-50 dark:bg-gray-950">

            @include('components.admin.header')

            <main class="flex-1 bg-gray-50 p-6 dark:bg-gray-950">
                @yield('content')
            </main>

        </div>

    </div>

</body>

</html>