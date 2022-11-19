<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'TOEFL Exam' }}</title>


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- @vite('resources/js/app.js') --}}
</head>

<body class="{{ $backgroundColor ?? 'default-background' }}">
    {{ $slot }}

</body>

</html>
