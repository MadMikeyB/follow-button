<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    
    public function toggleFollow(Request $request)
    {
        $item = $this->getItem($request);

        $item->toggleWatch();

        return response()->json(['success' => true], 200);
    }

    public function following(Request $request)
    {
        $item = $this->getItem($request);

        return response()->json($item->isWatched());
    }


    protected function getItem(Request $request)
    {
        $model = $this->findModel($request->type);
        
        if (!$model) {
            return response()->json(['success' => false, 'message' => 'The specified type could not be converted to a model instance.'], 404);
        }

        return $model::find($request->id);
    }

    protected function findModel($type)
    {
        switch ($type) {
            case 'article':
                return Article::class;
                break;

            case 'video':
                return Video::class;
                break;
                    
            default:
                return false;
                break;
        }
    }
}
