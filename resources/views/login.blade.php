<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS Login</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0a0a0a] text-[#e5e5e5] min-h-screen flex items-center justify-center">
    <main class="w-full max-w-md">
        <div class="bg-[#161616] border border-[#2a2a2a] rounded-lg shadow-2xl p-8">
            <h2 class="text-3xl font-semibold text-center mb-8 text-[#e5e5e5]">Iniciar Sesión en <span class="text-[#ff2d20]">POS</span></h2>
            
            @error('email')
                <div id="email-error" role="alert" aria-live="polite" 
                     class="mb-6 bg-[#ff2d20]/10 border border-[#ff2d20] text-[#ff2d20] px-4 py-3 rounded-md text-sm">
                    {{ $message }}
                </div>
            @enderror

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-medium text-[#e5e5e5] mb-2">
                        Correo electrónico
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           required 
                           autofocus 
                           @error('email') aria-describedby="email-error" aria-invalid="true" @enderror
                           class="w-full px-4 py-3 bg-[#0a0a0a] border border-[#2a2a2a] rounded-md text-[#e5e5e5] placeholder-[#a1a1a1] focus:outline-none focus:ring-2 focus:ring-[#ff2d20] focus:border-transparent transition-all duration-200">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-[#e5e5e5] mb-2">
                        Contraseña
                    </label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           required
                           class="w-full px-4 py-3 bg-[#0a0a0a] border border-[#2a2a2a] rounded-md text-[#e5e5e5] placeholder-[#a1a1a1] focus:outline-none focus:ring-2 focus:ring-[#ff2d20] focus:border-transparent transition-all duration-200">
                </div>
                
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full bg-[#ff2d20] hover:bg-[#e12513] text-white font-semibold py-3 px-4 rounded-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-[#ff2d20] focus:ring-offset-2 focus:ring-offset-[#161616]">
                        Iniciar Sesión
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
