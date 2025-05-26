@extends('layouts.app')
@section('title', 'Create Daily Report')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Create Daily Report</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('daily-reports.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <label for="report_date" class="col-md-3 col-form-label text-md-end">Report Date</label>
                                <div class="col-md-8">
                                    <input type="date" name="report_date" class="form-control @error('report_date') is-invalid @enderror" value="{{ old('report_date') }}" required>
                                    @error('report_date')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="title" class="col-md-3 col-form-label text-md-end">Title</label>
                                <div class="col-md-8">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                                    @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="pdf_content" class="col-md-3 col-form-label text-md-end">Upload PDF</label>
                                <div class="col-md-8">
                                    <input type="file" name="pdf_content" class="form-control @error('pdf_content') is-invalid @enderror" accept="application/pdf" required>
                                    @error('pdf_content')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-3 d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
