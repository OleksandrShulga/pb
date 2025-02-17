<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logic</title>
    <!-- Підключаємо CSS файл, зібраний Laravel Mix -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div id="app">
    @if(session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif
</div>
<!-- Підключаємо JavaScript файл, зібраний Laravel Mix -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
