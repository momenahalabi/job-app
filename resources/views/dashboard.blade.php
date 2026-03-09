<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white tracking-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Main Content Card -->
            <div class="bg-[#050505] rounded-xl border border-white/5 overflow-hidden">
                <div class="p-6 sm:p-10">
                    
                    <!-- Welcome Text -->
                    <h3 class="text-2xl sm:text-3xl font-bold text-white mb-8">Welcome back, {{ Auth::user()->name ?? 'Admin' }}!</h3>

                    <!-- Flash Success Message -->
                    @if(session('success'))
                        <div class="flex items-center gap-3 mb-8 p-4 rounded-xl bg-green-500/10 border border-green-500/30 text-green-400 text-sm">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Search & Filter Row -->
                    <form action="{{ route('dashboard') }}" method="GET">
                        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-10">
                            
                            <!-- Search Bar -->
                            <div class="flex w-full lg:max-w-md shadow-sm">
                                <input type="text" name="query" value="{{ request('query') }}"
                                    placeholder="Search for a job" 
                                    class="w-full bg-[#1c212b] border-none text-gray-300 rounded-l-lg px-4 py-2.5 focus:ring-0 placeholder-gray-500">
                                <button type="submit" class="bg-[#6366f1] hover:bg-[#4f46e5] text-white px-6 py-2.5 rounded-r-lg font-medium transition-colors">
                                    Search
                                </button>
                            </div>

                            <!-- Filters + Clear -->
                            <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto">
                                
                                <!-- Location Filter -->
                                <div class="w-full sm:w-44 relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                    <select name="location" onchange="this.form.submit()"
                                        class="block w-full pl-9 pr-8 py-2.5 border-none rounded-lg bg-[#1c212b] text-gray-300 focus:outline-none focus:ring-2 focus:ring-[#6366f1] sm:text-sm appearance-none cursor-pointer">
                                        <option value="">Any Location</option>
                                        <option value="dubai"         {{ request('location') === 'dubai'         ? 'selected' : '' }}>Dubai, UAE</option>
                                        <option value="remote"        {{ request('location') === 'remote'        ? 'selected' : '' }}>Remote</option>
                                        <option value="london"        {{ request('location') === 'london'        ? 'selected' : '' }}>London, UK</option>
                                        <option value="berlin"        {{ request('location') === 'berlin'        ? 'selected' : '' }}>Berlin, Germany</option>
                                        <option value="san francisco" {{ request('location') === 'san francisco' ? 'selected' : '' }}>San Francisco, CA</option>
                                        <option value="singapore"     {{ request('location') === 'singapore'     ? 'selected' : '' }}>Singapore</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-3.5 w-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </div>

                                <!-- Type Filter -->
                                <div class="w-full sm:w-44 relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </div>
                                    <select name="type" onchange="this.form.submit()"
                                        class="block w-full pl-9 pr-8 py-2.5 border-none rounded-lg bg-[#1c212b] text-gray-300 focus:outline-none focus:ring-2 focus:ring-[#6366f1] sm:text-sm appearance-none cursor-pointer">
                                        <option value="">Job Type</option>
                                        <option value="full-time"  {{ request('type') === 'full-time'  ? 'selected' : '' }}>Full-Time</option>
                                        <option value="part-time"  {{ request('type') === 'part-time'  ? 'selected' : '' }}>Part-Time</option>
                                        <option value="contract"   {{ request('type') === 'contract'   ? 'selected' : '' }}>Contract</option>
                                        <option value="freelance"  {{ request('type') === 'freelance'  ? 'selected' : '' }}>Freelance</option>
                                        <option value="hybrid"     {{ request('type') === 'hybrid'     ? 'selected' : '' }}>Hybrid</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-3.5 w-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </div>

                                <!-- Clear Button (visible only when filters are active) -->
                                @if(request()->hasAny(['query', 'location', 'type']))
                                    <a href="{{ route('dashboard') }}"
                                        class="flex items-center gap-1.5 bg-[#ef4444] hover:bg-[#dc2626] text-white text-sm font-medium px-4 py-2.5 rounded-lg transition-colors whitespace-nowrap">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                        Clear
                                    </a>
                                @endif

                            </div>
                        </div>
                    </form>

                    <!-- Job Listings -->
                    <div class="flex flex-col">

                        @forelse($jobs as $job)
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center py-6 border-t border-white/10 group {{ $loop->last ? 'border-b' : '' }}">
                                <div>
                                    <a href="{{ route('job-vacancies.show', $job['id']) }}"
                                        class="block text-[#60a5fa] font-semibold text-lg mb-1 group-hover:text-blue-300 transition-colors">
                                        {{ $job['title'] }}
                                    </a>
                                    <p class="text-gray-300 text-sm mb-1 leading-relaxed">{{ $job['company'] }} - {{ $job['location'] }}</p>
                                    <p class="text-gray-300 text-sm leading-relaxed">{{ $job['salary'] }} / Year</p>
                                </div>
                                <div class="mt-4 sm:mt-0">
                                    <span class="bg-[#3b82f6] text-white text-sm font-medium px-4 py-2 rounded-lg inline-block">{{ $job['type'] }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="py-16 text-center">
                                <svg class="w-12 h-12 text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                <p class="text-gray-400 text-lg font-medium">No jobs matched your search.</p>
                                <p class="text-gray-600 text-sm mt-1">Try adjusting your filters or search terms.</p>
                                <a href="{{ route('dashboard') }}" class="inline-block mt-4 text-[#60a5fa] hover:text-blue-300 text-sm transition-colors">Clear all filters →</a>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
