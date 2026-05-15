<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    //show all documents
    public function showDocuments()
    {
        // get only needed categories for display on the documents page
        $categories = Category::whereIn('category_name', ['Основные документы', 'Нормативные документы', 'Самообследование', 'Локальные', 'НОКО'])->get();
        $categoryId = request('category');

        if ($categoryId) {
            $documents = Document::where('category_id', $categoryId)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $documents = Document::with('category')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('pages.information.documents', compact('documents', 'categories'));
    }

    //show documents by category (deprecated, use query param in showDocuments)
    public function showByCategory($categoryId)
    {
        return $this->showDocuments();
    }

    //download document by id
    public function download($id)
    {
        $document = Document::findOrFail($id);
        $filePath = storage_path('app/public/' . $document->path);

        if (file_exists($filePath)) {
            return response()->download($filePath, $document->title . '.' . $document->type);
        }

        abort(404);
    }

    //view document by id
    public function view($id)
    {
        $document = Document::findOrFail($id);
        $filePath = storage_path('app/public/' . $document->path);

        if (file_exists($filePath)) {
            $mimeType = mime_content_type($filePath);
            return response()->file($filePath, [
                'Content-Type' => $mimeType
            ]);
        }

        abort(404);
    }
}