@extends('layouts.app')
@section('title', 'Create Daily Report')
@section('content')
    <h1>Create Daily Report</h1>
    <form method="POST" action="{{ route('daily-reports.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="report_date" class="form-label">Report Date</label>
            <input type="date" name="report_date" class="form-control" value="{{ old('report_date') }}" required>
            @error('report_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pdf_content" class="form-label">Upload PDF</label>
            <input type="file" name="pdf_content" class="form-control" accept="application/pdf" required>
            @error('pdf_content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
