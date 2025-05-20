<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ProposalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('proposals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf_content' => 'required|file|mimes:pdf|max:10240', // Max 10MB
            'description' => 'nullable|string',
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

        Proposal::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'pdf_content' => $pdfContent,
            'description' => $request->description,
        ]);

        return redirect()->route('home')->with('success', 'Proposal created successfully.');
    }

    public function download($id)
    {
        $proposal = Proposal::where('user_id', Auth::id())->findOrFail($id);
        $filename = str_replace(' ', '_', $proposal->title) . '.pdf';
        return Response::make($proposal->pdf_content, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Content-Length' => strlen($proposal->pdf_content),
        ]);
    }
}
