<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Careish</title>
    @vite(['resources/css/app.css', 'node_modules/flowbite/dist/flowbite.js', 'resources/js/app.js'])
    <wireui:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-50">
    {{ $slot }}

    @include('sweetalert::alert')
    @livewireScripts
</body>

</html>
