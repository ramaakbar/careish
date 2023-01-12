<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Careish</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <wireui:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.1/flowbite.min.js"></script>
    @livewireStyles
</head>

<body class="font-sans antialiased bg-[#FDFDFD]">
    {{ $slot }}

    <x-dialog />
    @if (session()->has('success'))
        <script>
            Wireui.hook('notifications:load', () => {
                $wireui.notify({
                    title: '{{ Session::get('success') }}',
                    icon: 'success',
                    timeout: 3000
                })
            })
        </script>
    @elseif(session()->has('error'))
        <script>
            Wireui.hook('notifications:load', () => {
                $wireui.notify({
                    title: '{{ Session::get('error') }}',
                    icon: 'error',
                    timeout: 3000
                })
            })
        </script>
    @endif
    <script>
        function reset() {
            document.getElementById('myForm').reset();
        }
    </script>
    <x-notifications />
    @livewireScripts
</body>

</html>
