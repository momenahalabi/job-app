<x-main-layout title="Shaghalni - Find your dream job">
    <div class="flex flex-col items-center justify-center pt-20 pb-16">
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 300)">
            <div x-cloak x-show="show" x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="inline-flex items-center mb-6">
                <!-- Badge -->
                <div class="flex items-center gap-3 bg-[#1a1a1a]/60 backdrop-blur-sm border border-white/5 text-white/80 text-xs sm:text-sm px-4 py-1.5 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500 shadow-[0_0_8px_rgba(244,63,94,0.8)]"></span>
                    Shaghalni
                </div>
            </div>
        </div>

        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 400)">
            <div x-cloak x-show="show" x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="text-center">
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');
                    .dream-job-font {
                        font-family: 'Playfair Display', serif;
                        letter-spacing: -2px;
                    }
                </style>
                <h1 class="text-5xl sm:text-7xl md:text-[5.5rem] font-black mb-2 tracking-tight">
                    <span class="text-white">Find your</span><br />
                    <span class="text-[#aaaaaa] dream-job-font italic font-bold text-6xl sm:text-8xl md:text-[6.5rem] leading-[0.8] drop-shadow-lg">Dream Job</span>
                </h1>
            </div>
        </div>

        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 500)">
            <div x-cloak x-show="show" x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <p class="text-[#888888] text-base sm:text-lg mb-10 max-w-2xl mx-auto px-4 mt-8 font-medium">
                    Connect with top employers, discover exciting opportunities, and take the next step in your career journey.
                </p>    
            </div>
        </div>

        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 600)">
            <div x-cloak x-show="show" x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-24">
                <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3.5 border border-white/5 text-sm font-semibold rounded-2xl text-white bg-[#151515] hover:bg-[#202020] transition-colors duration-300">
                    Create an Account
                </a>
                <a href="{{ route('login') }}" class="inline-flex items-center px-8 py-3.5 border border-transparent text-sm font-semibold rounded-2xl shadow-[0_0_20px_rgba(200,80,180,0.3)] text-white bg-gradient-to-r from-violet-500 to-rose-400 hover:opacity-90 hover:scale-105 transition-all duration-300 gap-2">
                    <span>Login</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        <!-- Stats Section -->
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 800)">
            <div x-cloak x-show="show" x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="flex flex-col md:flex-row items-center justify-center gap-12 sm:gap-20">
                
                <!-- Stat 1 -->
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-[#151515] border border-white/5 flex items-center justify-center text-rose-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                    </div>
                    <div class="text-left">
                        <h3 class="text-white font-bold text-lg leading-tight">12,000+</h3>
                        <p class="text-[#666666] text-sm font-medium">Active Jobs</p>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-[#151515] border border-white/5 flex items-center justify-center text-rose-500">
                         <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <div class="text-left">
                        <h3 class="text-white font-bold text-lg leading-tight">3,500+</h3>
                        <p class="text-[#666666] text-sm font-medium">Companies</p>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-[#151515] border border-white/5 flex items-center justify-center text-rose-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                    </div>
                    <div class="text-left">
                        <h3 class="text-white font-bold text-lg leading-tight">45,000+</h3>
                        <p class="text-[#666666] text-sm font-medium">Placements</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-main-layout>