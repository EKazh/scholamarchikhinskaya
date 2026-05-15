<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newinfo;
use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\View;

class NewsController extends Controller
{
    //show news-feed
    public function showNewsFeed()
    {
        $news = Newinfo::latest()->paginate(6);
        return view('pages.news.news-feed', compact('news'));
    }

    //show single news
    public function showNews($id)
    {
        $newsItem = Newinfo::findOrFail($id);
        return view('pages.news.news', compact('newsItem'));
    }

}
