<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield("title")</title>
</head>
<body class="dark:bg-gray-700 dark:text-gray-200">
    @yield("content")
</body>