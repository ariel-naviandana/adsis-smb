@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <h1>Welcome, {{ $user->name }}</h1>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Department:</strong> {{ $user->department }}</p>

    <h3>Your Daily Reports</h3>
    @if ($dailyReports->isEmpty())
        <p>No daily reports found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dailyReports as $report)
                    <tr>
                        <td>{{ $report->title }}</td>
                        <td>{{ $report->report_date }}</td>
                        <td>
                            <a href="{{ route('daily-reports.download', $report->id) }}" class="btn btn-primary btn-sm">Download PDF</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h3>Your Proposals</h3>
    @if ($proposals->isEmpty())
        <p>No proposals found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proposals as $proposal)
                    <tr>
                        <td>{{ $proposal->title }}</td>
                        <td>{{ $proposal->description ?? 'No description' }}</td>
                        <td>
                            <a href="{{ route('proposals.download', $proposal->id) }}" class="btn btn-primary btn-sm">Download PDF</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
