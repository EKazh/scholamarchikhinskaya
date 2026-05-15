<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newinfo;
use App\Models\Document;
use App\Models\Category;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = trim($request->input('query'));
        $results = [];

        if ($query) {
            // Разбиваем запрос на отдельные слова
            $keywords = preg_split('/\\s+/', $query);

            $newsResults = Newinfo::query();
            $documentResults = Document::query();

            foreach ($keywords as $word) {
                if (strlen($word) > 1) { // Игнорируем слишком короткие слова
                    $newsResults->where('news_title', 'LIKE', "%{$word}%");
                    $documentResults->where('title', 'LIKE', "%{$word}%");
                }
            }

            $results = [
                'news' => $newsResults->get(),
                'documents' => $documentResults->get(),
            ];
        }

        return view('search-results', compact('results', 'query'));
    }
}