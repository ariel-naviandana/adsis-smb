@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Welcome, {{ $user->name }}</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Department:</strong> {{ $user->department }}</p>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Your Daily Reports</h5>
                    </div>
                    <div class="card-body">
                        @if ($dailyReports->isEmpty())
                            <p class="mb-0">No daily reports found.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($dailyReports as $report)
                                        <tr>
                                            <td>{{ $report->title }}</td>
                                            <td>{{ $report->report_date }}</td>
                                            <td>
                                                <a href="{{ route('daily-reports.download', $report->id) }}" class="btn btn-primary btn-sm w-100">Download PDF</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Your Proposals</h5>
                    </div>
                    <div class="card-body">
                        @if ($proposals->isEmpty())
                            <p class="mb-0">No proposals found.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($proposals as $proposal)
                                        <tr>
                                            <td>{{ $proposal->title }}</td>
                                            <td>{{ $proposal->description ?? 'No description' }}</td>
                                            <td>
                                                <a href="{{ route('proposals.download', $proposal->id) }}" class="btn btn-primary btn-sm w-100">Download PDF</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
