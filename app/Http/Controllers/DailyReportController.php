<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class DailyReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('daily_reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'report_date' => 'required|date',
            'title' => 'required|string|max:255',
            'pdf_content' => 'required|file|mimes:pdf|max:10240', // Max 10MB
        ]);

        $file = $request->file('pdf_content');
        if (!$file->isValid()) {
            return back()->withErrors(['pdf_content' => 'Invalid file upload.']);
        }

        // Use Storage::get to handle binary data safely
        $pdfContent = file_get_contents($file->getRealPath());
        if ($pdfContent === false) {
            return back()->withErrors(['pdf_content' => 'Failed to read the uploaded PDF file.']);
        }

        DailyReport::create([
            'user_id' => Auth::id(),
            'report_date' => $request->report_date,
            'title' => $request->title,
            'pdf_content' => $pdfContent,
        ]);

        return redirect()->route('home')->with('success', 'Daily report created successfully.');
    }

    public function download($id)
    {
        $report = DailyReport::where('user_id', Auth::id())->findOrFail($id);
        $filename = str_replace(' ', '_', $report->title) . '.pdf';
        return Response::make($report->pdf_content, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Content-Length' => strlen($report->pdf_content),
        ]);
    }
}
