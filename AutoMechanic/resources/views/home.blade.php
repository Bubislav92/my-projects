<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аутосервис - Ваш поуздан партнер за аутомобиле</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/20zG1zJ/1xJ/jR/h/yB1T8zG1Bw1uLpGvD+C8Q8pQ6/vE1F0e2fQ2p9/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    @include('components.navigation')

    @include('components.hero')

    @include('components.services')

    @include('components.about')

    @include('components.testimonials')

    @include('components.contact')

    @include('components.footer')
    
</body>
</html>