<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VET - Your Premier Veterinary Clinic for Comprehensive Pet Care</title>
    
    <meta name="description" content="VET is a compassionate and professional veterinary clinic offering comprehensive care, from wellness and vaccinations to advanced diagnostics and surgery. Book an appointment today!">
    <meta name="keywords" content="veterinary clinic, vet, pet care, animal hospital, dog vet, cat vet, pet vaccinations, pet surgery, pet grooming, VET">
    <meta name="author" content="VET Veterinary Clinic">
    <link rel="canonical" href="https://www.vasdomen.com/"> 
    
    <meta property="og:title" content="VET - Trusted Veterinary Care">
    <meta property="og:description" content="Compassionate and professional veterinary services for dogs, cats, and all pets.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.vasdomen.com/">
    <meta property="og:image" content="https://www.vasdomen.com/images/og-image-vet.jpg"> 
    <meta property="og:site_name" content="VET">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@VetClinic"> 
    <meta name="twitter:creator" content="@VetClinic">
    <meta name="twitter:title" content="VET - Premium Pet Health">
    <meta name="twitter:description" content="Book an appointment for comprehensive pet wellness, diagnostics, and surgical care.">
    <meta name="twitter:image" content="https://www.vasdomen.com/images/twitter-card-vet.jpg">

    <link rel="icon" type="image/png" href="/images/favicon-32x32.png">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white antialiased">
    <x-header />

    <main>
        
        <x-about.about-hero />

        <x-about.mission-values />

        <x-about.history-timeline />

        <div class="py-16 bg-secondary-50">
            <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-extrabold tracking-tight text-text-default sm:text-4xl">
                    Ready to join the VET family?
                </h2>
                <div class="mt-8">
                    <a href="/appointment" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-lg text-white bg-primary-500 hover:bg-primary-600 transition duration-150 ease-in-out">
                        Book Your First Visit
                    </a>
                </div>
            </div>
        </div>

    </main>

    <x-footer />
    
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXX-Y"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-XXXXXX-Y');
    </script>

</body>
</html>