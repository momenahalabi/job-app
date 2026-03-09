<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white tracking-tight">
            {{ __('My Applications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="space-y-6">
                @forelse($applications as $app)
                    <div class="bg-[#0d0f14] rounded-xl border border-white/5 overflow-hidden p-6 sm:p-8">

                        <!-- Header Row: Title + Job Type Badge -->
                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-6">
                            <div>
                                <h3 class="text-xl sm:text-2xl font-bold text-white mb-2">{{ $app['title'] }}</h3>
                                <p class="text-gray-400 text-sm mb-1">{{ $app['company'] }}</p>
                                <p class="text-gray-500 text-sm">{{ $app['location'] }}</p>
                            </div>
                            <span class="shrink-0 inline-flex items-center px-4 py-2 rounded-lg bg-[#3b82f6] text-white text-sm font-medium">
                                {{ $app['type'] }}
                            </span>
                        </div>

                        <!-- Resume + Date Row -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
                            <div class="flex flex-wrap items-center gap-2 text-sm text-gray-300">
                                <span>Applied With:</span>
                                <a href="#" class="text-[#60a5fa] hover:text-blue-300 font-medium transition-colors">{{ $app['resume_name'] }}</a>
                                <a href="#" class="text-[#60a5fa] hover:text-blue-300 text-sm transition-colors">View Resume</a>
                            </div>
                            <p class="text-gray-500 text-sm">{{ $app['applied_date'] }}</p>
                        </div>

                        <!-- Status & Score Badges -->
                        <div class="flex flex-wrap gap-3 mb-6">
                            <span class="inline-flex items-center px-4 py-2 rounded-lg bg-amber-500/20 border border-amber-500/40 text-amber-400 text-sm font-medium">
                                Status: {{ $app['status'] }}
                            </span>
                            <span class="inline-flex items-center px-4 py-2 rounded-lg bg-violet-500/20 border border-violet-500/40 text-violet-300 text-sm font-medium">
                                Score: {{ $app['score'] }}
                            </span>
                        </div>

                        <!-- AI Feedback -->
                        @if(!empty($app['ai_feedback']))
                            <div>
                                <h4 class="text-sm font-semibold text-white mb-2">AI Feedback:</h4>
                                <p class="text-gray-400 text-sm leading-relaxed">{{ $app['ai_feedback'] }}</p>
                            </div>
                        @else
                            <div>
                                <h4 class="text-sm font-semibold text-white mb-2">AI Feedback:</h4>
                                <p class="text-gray-500 text-sm italic">No feedback available yet.</p>
                            </div>
                        @endif

                    </div>
                @empty
                    <div class="bg-[#050505] rounded-xl border border-white/5 overflow-hidden p-12 text-center">
                        <svg class="w-16 h-16 text-gray-600 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p class="text-gray-400 text-lg font-medium">You haven't applied to any jobs yet.</p>
                        <p class="text-gray-500 text-sm mt-2">Browse job listings and apply to see your applications here.</p>
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 mt-6 text-[#60a5fa] hover:text-blue-300 font-medium transition-colors">
                            Browse Jobs
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
