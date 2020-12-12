@extends('front-end.master')
@section('main-body')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 ">
            @foreach($jobs as $job)
            <div class="post-preview">
                <a href="">
                <p class="post-meta">
                    Job title:
                </p>
                    <h2 class="post-title">
                        {{ $job->job_title }}
                    </h2>
                <p class="post-meta">
                    Company name:
                </p>
                    <h4 class="post-subtitle">
                        {{ $job->company_name }}
                    </h4>
                </a>
                <p class="post-meta">
                    Job responsibility:
                </p>
                <p class="post-preview">
                    {{ $job->job_responsibilities }}
                </p>
                <p class="post-meta">
                    Employee status:
                </p>
                <p class="post-preview">
                    {{ $job->employee_status }}
                </p>
                <p class="post-meta">
                    Educational requirement:
                </p>
                <p class="post-preview">
                    {{ $job->educational_requirement }}
                </p>
                <p class="post-meta">
                    Experience requirement:
                </p>
                <p class="post-preview">
                    {{ $job->experience_requirement }}
                </p>
                <p class="post-meta">
                    Additional requirement:
                </p>
                <p class="post-preview">
                    {{ $job->additional_requirement }}
                </p>
                <p class="post-meta">
                    job location:
                </p>
                <p class="post-preview">
                    {{ $job->job_location }}
                </p>
                <p class="post-meta">
                    Salary:
                </p>
                <p class="post-preview">
                    {{ $job->salary }}
                </p>
                <p class="post-preview">
                    {{ $job->category_id }}
                </p>
                <a type="button" class="btn btn-primary btn-sm text-white" href="{{ route('apply.job', ['id' => $job->id ]) }}">Apply</a>
                <hr>
                @endforeach
            </div>
        </div>
    </div>

</body>
</html>
@endsection
