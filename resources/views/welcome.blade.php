<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ECUPÁDEL CLUB - El Semillero</title>

    <!-- Fuentes y estilos -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-black text-white font-montserrat">

   <!-- Encabezado -->
<header class="bg-black border-b-4 border-yellow-400 shadow-md py-4">
    <div class="container mx-auto flex justify-center">
        <img src="{{ asset('images/logo.jpg') }}" alt="ECUPÁDEL CLUB Logo" class="h-32 w-auto">
    </div>
</header>


    <!-- Contenido principal -->
    <main class="container mx-auto px-4 py-12 text-center">
        <h1 class="text-4xl font-bold text-yellow-400 mb-6">¡Bienvenido a ECUPÁDEL CLUB!</h1>
        <p class="text-lg mb-8 max-w-3xl mx-auto">
            ECUPÁDEL CLUB, "El Semillero", es el hogar del deporte, la comunidad y el desarrollo de talentos. Únete a nosotros para aprender, competir y disfrutar en un entorno diseñado para los apasionados del pádel.
        </p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('register') }}" 
               class="bg-blue-700 hover:bg-yellow-400 hover:text-black text-white font-bold py-3 px-6 rounded-lg shadow-md transform hover:scale-105 transition-all duration-300">
               Regístrate Ahora
            </a>
            <a href="{{ route('login') }}" 
               class="bg-yellow-400 text-black hover:bg-blue-700 hover:text-white font-bold py-3 px-6 rounded-lg shadow-md transform hover:scale-105 transition-all duration-300">
               Iniciar Sesión
            </a>
        </div>
    </main>

    <!-- Sección de beneficios -->
    <section class="bg-blue-900 py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-yellow-400 mb-6">¿Por qué elegir ECUPÁDEL CLUB?</h2>
            <div class="grid md:grid-cols-3 gap-6 text-white">
                <div class="p-6 bg-blue-800 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold mb-4">Clases Personalizadas</h3>
                    <p>Entrena con profesionales que se adaptan a tu nivel y metas.</p>
                </div>
                <div class="p-6 bg-blue-800 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold mb-4">Competencias Exclusivas</h3>
                    <p>Participa en torneos diseñados para jugadores de todos los niveles.</p>
                </div>
                <div class="p-6 bg-blue-800 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold mb-4">Infraestructura Premium</h3>
                    <p>Disfruta de instalaciones de primera clase para practicar tu deporte favorito.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pie de página -->
    <footer class="bg-black text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} ECUPÁDEL CLUB. Todos los derechos reservados.</p>
            <p class="mt-2">Diseñado con <span class="text-yellow-400 font-bold">pasión</span> para los amantes del pádel.</p>
        </div>
    </footer>

</body>
</html>
