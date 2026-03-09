<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white tracking-tight">
            {{ $job['title'] ?? 'DevOps Engineer' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0d0f14] rounded-xl border border-white/5 overflow-hidden p-6 sm:p-10">

                <!-- Back Link -->
                <div class="mb-8">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-[#60a5fa] hover:text-blue-300 transition-colors text-sm font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Jobs
                    </a>
                </div>

                @if(session('already_applied'))
                    <div class="flex items-center gap-3 mb-8 p-4 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-400 text-sm">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
                        {{ session('already_applied') }}
                    </div>
                @endif

                <!-- Job Header -->
                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-6 mb-10">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">{{ $job['title'] ?? 'DevOps Engineer' }}</h1>
                        <p class="text-gray-400 text-base mb-3">{{ $job['company'] ?? 'CloudTech Systems' }}</p>
                        <div class="flex flex-wrap items-center gap-3 text-sm text-gray-400">
                            <span>{{ $job['location'] ?? 'Dubai, UAE' }}</span>
                            <span class="text-gray-600">•</span>
                            <span>{{ $job['salary'] ?? '$120,000' }}</span>
                            <span class="bg-gradient-to-r from-violet-600 to-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-lg">
                                {{ $job['type'] ?? 'Full-Time' }}
                            </span>
                        </div>
                    </div>

                    <!-- Apply Button -->
                    <div class="shrink-0">
                        <a href="{{ route('job-vacancies.apply', $job['id'] ?? 1) }}"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-violet-600 to-rose-500 hover:from-violet-500 hover:to-rose-400 text-white font-semibold px-8 py-3 rounded-xl transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_0_20px_rgba(200,80,180,0.4)] focus:outline-none">
                            Apply Now
                        </a>
                    </div>
                </div>

                <!-- Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <!-- Job Description (Left) -->
                    <div class="lg:col-span-2 space-y-8">
                        <div>
                            <h2 class="text-lg font-semibold text-white mb-3">Job Description</h2>
                            <p class="text-gray-400 leading-relaxed text-sm">
                                {{ $job['description'] ?? "We're seeking a DevOps Engineer to streamline our development and deployment processes. You'll work with our engineering teams to implement CI/CD pipelines and ensure smooth operations." }}
                            </p>
                        </div>

                        @isset($job['responsibilities'])
                        <div>
                            <h2 class="text-lg font-semibold text-white mb-3">Responsibilities</h2>
                            <ul class="list-disc list-inside space-y-2 text-gray-400 text-sm">
                                @foreach($job['responsibilities'] as $item)
                                    <li class="leading-relaxed">{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endisset

                        @isset($job['requirements'])
                        <div>
                            <h2 class="text-lg font-semibold text-white mb-3">Requirements</h2>
                            <ul class="list-disc list-inside space-y-2 text-gray-400 text-sm">
                                @foreach($job['requirements'] as $item)
                                    <li class="leading-relaxed">{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endisset
                    </div>

                    <!-- Job Overview (Right Sidebar) -->
                    <div class="lg:col-span-1">
                        <div class="bg-[#1c212b] rounded-xl p-6 space-y-5">
                            <h2 class="text-base font-semibold text-white mb-2">Job Overview</h2>

                            <!-- Company -->
                            <div class="border-t border-white/5 pt-4">
                                <p class="text-gray-500 text-xs mb-1">Company</p>
                                <p class="text-white text-sm font-medium">{{ $job['company'] ?? 'CloudTech Systems' }}</p>
                            </div>

                            <!-- Location -->
                            <div class="border-t border-white/5 pt-4">
                                <p class="text-gray-500 text-xs mb-1">Location</p>
                                <p class="text-white text-sm font-medium">{{ $job['location'] ?? 'Dubai, UAE' }}</p>
                            </div>

                            <!-- Salary -->
                            <div class="border-t border-white/5 pt-4">
                                <p class="text-gray-500 text-xs mb-1">Salary</p>
                                <p class="text-white text-sm font-medium">{{ $job['salary'] ?? '$120,000' }}</p>
                            </div>

                            <!-- Type -->
                            <div class="border-t border-white/5 pt-4">
                                <p class="text-gray-500 text-xs mb-1">Type</p>
                                <p class="text-white text-sm font-medium">{{ $job['type'] ?? 'Full-Time' }}</p>
                            </div>

                            <!-- Category -->
                            <div class="border-t border-white/5 pt-4">
                                <p class="text-gray-500 text-xs mb-1">Category</p>
                                <span class="inline-block bg-[#3b82f6]/20 text-[#60a5fa] text-xs font-semibold px-3 py-1.5 rounded-lg mt-1">
                                    {{ $job['category'] ?? 'DevOps Engineering' }}
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
