<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    /**
     * Toggle the follow state for the given content item.
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response 
     */
    public function toggleFollow(Request $request)
    {
        $item = $this->getItem($request);

        $item->toggleWatch();

        return response()->json(['success' => true], 200);
    }

    /**
     * Check if the user is already following the given content item
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function following(Request $request)
    {
        $item = $this->getItem($request);

        return response()->json($item->isWatched());
    }

    /**
     * Fetch the given item from the database
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Database\Eloquent\Model|Illuminate\Http\Response
     */
    protected function getItem(Request $request)
    {
        $model = $this->findModel($request->type);
        
        if (!$model) {
            return response()->json(['success' => false, 'message' => 'The specified type could not be converted to a model instance.'], 404);
        }

        return $model::find($request->id);
    }

    /**
     * Determine the model for the given content type
     * 
     * @param string $type The content type
     * @return Illuminate\Database\Eloquent\Model|bool
     */
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
