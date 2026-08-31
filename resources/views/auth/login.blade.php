<x-guest-layout>
    <div class="text-center mb-7">
        <h1 class="text-xl font-extrabold text-navy-950 tracking-tight">Masuk ke Panel Admin</h1>
        <p class="text-sm text-gray-500 mt-1">Silakan login untuk mengelola konten website.</p>
    </div>

    {{-- Session Status --}}
    @if (session('status'))
        <div class="mb-5 rounded-xl bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-2.5">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        {{-- Email --}}
        <div>
            <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                    <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                       class="block w-full pl-10 pr-3.5 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:border-navy/50 focus:ring-2 focus:ring-navy/15 transition"
                       placeholder="nama@email.com">
            </div>
            @error('email')
                <p class="text-red-600 text-xs mt-1.5 font-medium">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div>
            <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                    <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       class="block w-full pl-10 pr-3.5 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:border-navy/50 focus:ring-2 focus:ring-navy/15 transition"
                       placeholder="••••••••">
            </div>
            @error('password')
                <p class="text-red-600 text-xs mt-1.5 font-medium">{{ $message }}</p>
            @enderror
        </div>

        {{-- Remember Me + Lupa Password --}}
        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                <input id="remember_me" type="checkbox" name="remember"
                       class="rounded border-gray-300 text-navy focus:ring-navy/30">
                <span class="ml-2 text-xs font-medium text-gray-600">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-xs font-bold text-navy hover:text-gold-deep transition-colors">
                    Lupa password?
                </a>
            @endif
        </div>

        {{-- Tombol submit --}}
        <button type="submit"
                class="w-full bg-gradient-to-r from-navy to-navy-700 hover:from-navy-700 hover:to-navy-800 text-white font-bold py-3 rounded-xl shadow-lg transition-all duration-200 hover:-translate-y-0.5 flex items-center justify-center gap-2 border border-navy-600">
            <svg class="w-4 h-4 text-gold-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
            Masuk
        </button>
    </form>
</x-guest-layout>