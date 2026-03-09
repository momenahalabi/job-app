<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /** @var array<int, array<string, string>> */
    private function jobs(): array
    {
        return [
            ['id' => 1, 'title' => 'DevOps Engineer',         'company' => 'CloudTech Systems',       'location' => 'Dubai, UAE',          'salary' => '$120,000', 'type' => 'Full-Time',  'category' => 'DevOps Engineering',    'description' => "We're seeking a DevOps Engineer to streamline our development and deployment processes. You'll work with our engineering teams to implement CI/CD pipelines and ensure smooth operations."],
            ['id' => 2, 'title' => 'Software Architect',      'company' => 'Agile Software Corp',     'location' => 'San Francisco, CA',   'salary' => '$190,000', 'type' => 'Full-Time',  'category' => 'Software Engineering',  'description' => 'Design and oversee scalable software architecture for enterprise-level applications.'],
            ['id' => 3, 'title' => 'Senior Frontend Developer','company' => 'Digital Innovate Labs',  'location' => 'London, UK',          'salary' => '$145,000', 'type' => 'Full-Time',  'category' => 'Frontend Development',  'description' => 'Build beautiful, performant UI components using modern JavaScript frameworks.'],
            ['id' => 4, 'title' => 'Backend Developer',       'company' => 'CloudTech Systems',       'location' => 'Berlin, Germany',     'salary' => '$95,000',  'type' => 'Full-Time',  'category' => 'Backend Development',   'description' => 'Develop robust APIs and backend services powering our platform.'],
            ['id' => 5, 'title' => 'Cloud Engineer',          'company' => 'TechCore Corp.',          'location' => 'Singapore',           'salary' => '$130,000', 'type' => 'Full-Time',  'category' => 'Cloud Computing',       'description' => 'Design and maintain cloud infrastructure on AWS and GCP for high-availability systems.'],
        ];
    }

    public function index(Request $request): \Illuminate\View\View
    {
        $jobs = collect($this->jobs());

        if ($request->filled('query')) {
            $q = strtolower($request->query);
            $jobs = $jobs->filter(fn ($j) => str_contains(strtolower($j['title']), $q)
                || str_contains(strtolower($j['company']), $q));
        }

        if ($request->filled('location')) {
            $loc = strtolower($request->location);
            $jobs = $jobs->filter(fn ($j) => str_contains(strtolower($j['location']), $loc));
        }

        if ($request->filled('type')) {
            $type = strtolower($request->type);
            $jobs = $jobs->filter(fn ($j) => strtolower(str_replace('-', ' ', $j['type'])) === str_replace('-', ' ', $type));
        }

        return view('dashboard', ['jobs' => $jobs->values()]);
    }

    public function show(int $id): \Illuminate\View\View
    {
        $job = collect($this->jobs())->firstWhere('id', $id);

        abort_if($job === null, 404);

        return view('job-vacancies.show', compact('job'));
    }

    public function apply(int $id): \Illuminate\View\View|\Illuminate\Http\RedirectResponse
    {
        $job = collect($this->jobs())->firstWhere('id', $id);

        abort_if($job === null, 404);

        if (in_array($id, session('applied_jobs', []))) {
            return redirect()->route('job-vacancies.show', $id)
                ->with('already_applied', 'You have already applied for this position.');
        }

        return view('job-vacancies.apply', compact('job'));
    }

    public function submitApply(int $id, \Illuminate\Http\Request $request): \Illuminate\Http\RedirectResponse
    {
        $job = collect($this->jobs())->firstWhere('id', $id);

        abort_if($job === null, 404);

        // Prevent duplicate submissions
        if (in_array($id, session('applied_jobs', []))) {
            return redirect()->route('job-vacancies.show', $id)
                ->with('already_applied', 'You have already applied for this position.');
        }

        $request->validate([
            'resume_file' => ['required', 'file', 'mimes:pdf', 'max:5120'],
            'cover_letter' => ['nullable', 'string', 'max:5000'],
        ], [
            'resume_file.required' => 'Please upload your resume before submitting.',
            'resume_file.mimes'    => 'Only PDF files are accepted.',
            'resume_file.max'      => 'Resume must not exceed 5MB.',
        ]);

        // Save applied job and resume filename in session
        $applied = session('applied_jobs', []);
        $applied[] = $id;
        session(['applied_jobs' => $applied]);

        $resumes = session('applied_resumes', []);
        $resumes[$id] = $request->file('resume_file')->getClientOriginalName();
        session(['applied_resumes' => $resumes]);

        $appliedDates = session('applied_dates', []);
        $appliedDates[$id] = now()->format('d M Y');
        session(['applied_dates' => $appliedDates]);

        return redirect()->route('dashboard')
            ->with('success', 'Your application for "' . $job['title'] . '" has been submitted successfully!');
    }
}
