<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobApplicationsController extends Controller
{
    /** @var array<int, array<string, mixed>> */
    private function jobs(): array
    {
        return [
            ['id' => 1, 'title' => 'DevOps Engineer',         'company' => 'CloudTech Systems',       'location' => 'Dubai, UAE',          'salary' => '$120,000', 'type' => 'Full-Time',  'category' => 'DevOps Engineering'],
            ['id' => 2, 'title' => 'Software Architect',      'company' => 'Agile Software Corp',     'location' => 'San Francisco, CA',   'salary' => '$190,000', 'type' => 'Full-Time',  'category' => 'Software Engineering'],
            ['id' => 3, 'title' => 'Senior Frontend Developer','company' => 'Digital Innovate Labs',  'location' => 'London, UK',          'salary' => '$145,000', 'type' => 'Full-Time',  'category' => 'Frontend Development'],
            ['id' => 4, 'title' => 'Backend Developer',       'company' => 'CloudTech Systems',       'location' => 'Berlin, Germany',     'salary' => '$95,000',  'type' => 'Full-Time',  'category' => 'Backend Development'],
            ['id' => 5, 'title' => 'Cloud Engineer',          'company' => 'TechCore Corp.',          'location' => 'Singapore',           'salary' => '$130,000', 'type' => 'Full-Time',  'category' => 'Cloud Computing'],
        ];
    }

    public function index(Request $request)
    {
        $appliedIds = session('applied_jobs', []);
        $resumes = session('applied_resumes', []);
        $appliedDates = session('applied_dates', []);

        $jobs = collect($this->jobs());
        $applications = [];

        foreach (array_values($appliedIds) as $index => $jobId) {
            $job = $jobs->firstWhere('id', $jobId);
            if (!$job) continue;

            $resumeName = $resumes[$jobId] ?? 'Resume-' . str_replace(' ', '-', auth()->user()->name ?? 'User') . '-Apr-2025.pdf';
            $appliedDate = $appliedDates[$jobId] ?? now()->format('d M Y');

            $aiFeedback = 'Yahya has over 10 years of experience in software engineering, primarily front-end and full-stack (React, Node.js). The job requires specific DevOps skills, CI/CD, AWS, and GCP experience. Yahya has some cloud exposure (AWS, GCP) but the resume lacks direct DevOps practices (CI/CD, IaC, Docker, Kubernetes). The experience focuses more on software development/architecture than operational DevOps aspects. No specific experience with setting up/managing CI/CD pipelines is mentioned. Summary: Yahya has a solid technical foundation and cloud experience but lacks specific DevOps skills needed. Recommend gaining more direct DevOps experience.';

            $applications[] = array_merge($job, [
                'resume_name'   => $resumeName,
                'applied_date'  => $appliedDate,
                'status'        => 'pending',
                'score'         => $index === 0 ? 45 : 0,
                'ai_feedback'   => $index === 0 ? $aiFeedback : '',
            ]);
        }

        return view('job-applications.index', ['applications' => $applications]);
    }
}
