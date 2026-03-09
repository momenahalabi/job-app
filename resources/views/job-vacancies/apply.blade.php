<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white tracking-tight">
            {{ $job['title'] ?? 'Software Architect' }} - Apply
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0d0f14] rounded-xl border border-white/5 overflow-hidden p-6 sm:p-10">

                <!-- Back Link -->
                <div class="mb-8">
                    <a href="{{ route('job-vacancies.show', $job['id'] ?? 1) }}"
                        class="inline-flex items-center gap-2 text-[#60a5fa] hover:text-blue-300 transition-colors text-sm font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Job Details
                    </a>
                </div>

                <!-- Job Header -->
                <div class="mb-10">
                    <h1 class="text-2xl font-bold text-white mb-1">{{ $job['title'] ?? 'Software Architect' }}</h1>
                    <p class="text-gray-400 text-sm mb-3">{{ $job['company'] ?? 'Agile Software Corp' }}</p>
                    <div class="flex flex-wrap items-center gap-3 text-sm text-gray-400">
                        <span>{{ $job['location'] ?? 'San Francisco, CA' }}</span>
                        <span class="text-gray-600">•</span>
                        <span>{{ $job['salary'] ?? '$190,000' }}</span>
                        <span class="bg-gradient-to-r from-violet-600 to-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-lg">
                            {{ $job['type'] ?? 'Full-Time' }}
                        </span>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-white/10 mb-8"></div>

                <!-- Application Form -->
                <form action="#" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <!-- Choose Resume Section -->
                    <div>
                        <h2 class="text-lg font-semibold text-white mb-1">Choose Your Resume</h2>
                        <p class="text-gray-500 text-sm mb-5">Upload your resume in PDF format (Max 5MB).</p>

                        <!-- Upload Resume -->
                        <label for="resume_file"
                            class="flex flex-col items-center justify-center w-full py-12 border-2 border-dashed {{ $errors->has('resume_file') ? 'border-rose-500/70 bg-rose-500/5' : 'border-white/15 hover:border-violet-500/50 hover:bg-white/5' }} rounded-xl cursor-pointer transition-all duration-300 group">
                            <div class="w-12 h-12 rounded-xl {{ $errors->has('resume_file') ? 'bg-rose-500/20' : 'bg-violet-500/20' }} flex items-center justify-center {{ $errors->has('resume_file') ? 'text-rose-400' : 'text-violet-400' }} mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                </svg>
                            </div>
                            <p class="text-gray-300 text-sm font-medium">Click to upload PDF</p>
                            <p class="text-gray-600 text-xs mt-1">Max file size: 5MB</p>
                            <input id="resume_file" type="file" name="resume_file" accept=".pdf" class="hidden">
                        </label>
                        <p id="file-name-preview" class="mt-3 text-xs text-violet-400 hidden"></p>

                        @error('resume_file')
                            <div class="mt-3 flex items-center gap-2 text-rose-400 text-sm">
                                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Cover Letter (optional) -->
                    <div>
                        <label for="cover_letter" class="block text-sm font-medium text-gray-300 mb-2">
                            Cover Letter <span class="text-gray-600 font-normal">(optional)</span>
                        </label>
                        <textarea id="cover_letter" name="cover_letter" rows="5"
                            placeholder="Tell the employer why you're a great fit..."
                            class="block w-full px-4 py-3 border border-white/10 rounded-xl bg-white/5 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500 transition-all duration-300 text-sm resize-none">{{ old('cover_letter') }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 py-3.5 px-6 text-sm font-semibold text-white bg-gradient-to-r from-violet-600 to-rose-500 rounded-xl hover:scale-[1.01] hover:shadow-[0_0_20px_rgba(200,80,180,0.4)] transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            Apply Now
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- File name preview script -->
    <script>
        document.getElementById('resume_file').addEventListener('change', function () {
            const preview = document.getElementById('file-name-preview');
            if (this.files.length > 0) {
                preview.textContent = '✓ Selected: ' + this.files[0].name;
                preview.classList.remove('hidden');
            } else {
                preview.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
