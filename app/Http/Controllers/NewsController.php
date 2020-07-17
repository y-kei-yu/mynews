<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\HTML;

use App\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');
        
        if(count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        //news/index.bladde.php ファイルを渡している
        //また　Viewテンプレートにheadline、posts、という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
