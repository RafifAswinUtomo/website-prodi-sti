<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Panel Admin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <x-toast />

    <div class="flex min-h-screen">
        <x-admin-sidebar />

        <div class="flex-1 flex flex-col min-w-0">
            @isset($header)
                <header class="bg-white shadow-sm px-6 py-5">
                    {{ $header }}
                </header>
            @endisset

            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
