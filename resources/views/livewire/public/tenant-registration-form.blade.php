<form wire:submit.prevent="register" class="space-y-6">
    <!-- Success Message -->
    @if ($successMessage)
        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
            <div class="flex">
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">
                        {{ $successMessage }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <!-- Error Message -->
    @if ($errorMessage)
        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
            <div class="flex">
                <div class="ml-3">
                    <p class="text-sm font-medium text-red-800">
                        {{ $errorMessage }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    @csrf

    <!-- Business Information -->
    <div class="border-b border-gray-200 pb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Información del Negocio</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="business_name" class="block text-sm font-medium text-gray-700 mb-2">
                    Nombre del Negocio *
                </label>
                <input type="text" id="business_name" wire:model.live="business_name"
                    placeholder="Ej: Clínica Dental López"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('business_name') border-red-500 @enderror"
                    :disabled="$isLoading">
                @error('business_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="business_type" class="block text-sm font-medium text-gray-700 mb-2">
                    Tipo de Negocio *
                </label>
                <select id="business_type" wire:model="business_type"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('business_type') border-red-500 @enderror"
                    :disabled="$isLoading">
                    <option value="">Selecciona tu sector</option>
                    @foreach ($businessTypes as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
                @error('business_type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <label for="subdomain" class="block text-sm font-medium text-gray-700 mb-2">
                Dirección de tu Negocio *
            </label>
            <div class="flex">
                <input type="text" id="subdomain" wire:model.live="subdomain" placeholder="mi-negocio"
                    pattern="[a-zA-Z0-9-]+"
                    class="flex-1 px-4 py-3 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('subdomain') border-red-500 @enderror"
                    :disabled="$isLoading">
                <span class="px-4 py-3 bg-gray-100 border border-l-0 border-gray-300 rounded-r-lg text-gray-600">
                    .reasy.com
                </span>
            </div>

            @if ($subdomain)
                <div class="mt-2">
                    @if ($subdomainAvailable === true)
                        <p class="text-sm text-green-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            ¡Disponible! {{ $subdomain }}.reasy.com
                        </p>
                    @elseif($subdomainAvailable === false)
                        <p class="text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            No disponible: {{ $subdomain }}.reasy.com
                        </p>
                    @endif
                </div>
            @endif

            @error('subdomain')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror

            <p class="mt-1 text-sm text-gray-500">Esta será la dirección web de tu negocio. Solo letras, números y
                guiones.</p>
        </div>
    </div>

    <!-- Personal Information -->
    <div class="pb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Tu Información</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">
                    Nombre *
                </label>
                <input type="text" id="first_name" wire:model="first_name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('first_name') border-red-500 @enderror"
                    :disabled="$isLoading">
                @error('first_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">
                    Apellidos *
                </label>
                <input type="text" id="last_name" wire:model="last_name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('last_name') border-red-500 @enderror"
                    :disabled="$isLoading">
                @error('last_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                Email *
            </label>
            <input type="email" id="email" wire:model="email"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                :disabled="$isLoading">
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                Teléfono
            </label>
            <input type="tel" id="phone" wire:model="phone" placeholder="+34 600 000 000"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('phone') border-red-500 @enderror"
                :disabled="$isLoading">
            @error('phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                Contraseña *
            </label>
            <input type="password" id="password" wire:model="password" minlength="8"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror"
                :disabled="$isLoading">
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <p class="mt-1 text-sm text-gray-500">Mínimo 8 caracteres</p>
        </div>
    </div>

    <!-- Terms -->
    <div class="flex items-start">
        <input type="checkbox" id="terms" wire:model="terms"
            class="mt-1 h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 @error('terms') border-red-500 @enderror"
            :disabled="$isLoading">
        <label for="terms" class="ml-3 text-sm text-gray-600">
            Acepto los <a href="{{ route('landing.terms') }}" class="text-indigo-600 hover:text-indigo-500">términos
                de servicio</a>
            y la <a href="{{ route('landing.privacy') }}" class="text-indigo-600 hover:text-indigo-500">política de
                privacidad</a> *
        </label>
        @error('terms')
            <p class="ml-7 mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" wire:loading.attr="disabled" wire:target="register"
        class="w-full bg-indigo-600 text-white py-4 px-6 rounded-lg font-semibold text-lg hover:bg-indigo-700 transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center">

        <span wire:loading.remove wire:target="register">
            Crear mi Cuenta Gratuita
        </span>

        <span wire:loading wire:target="register" class="flex items-center">
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                    stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            Creando cuenta...
        </span>
    </button>
</form>
