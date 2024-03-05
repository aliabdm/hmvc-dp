<?php

namespace Modules\Content\Repositories;

use Modules\Content\app\Models\Like;
use Modules\Content\app\Models\Content;
use Modules\Content\app\Models\ContentType;

class ContentRepositories extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'text',
        "content_type_id"
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Content::class;
    }

    public function viewBasedOnUser()
    {
        $viewName = auth()->user()->is_admin ? "index" : "home";
        return $viewName;
    }

    public function paginateWithEagerRelation()
    {
        $contents = $this->model::with('contentType','likes')->paginate();
        return $contents;
    }

    public function youMayLike()
    {
        $user = auth()->user();

        $contents = ContentType::whereHas('contents.likes', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->with(['contents' => function ($query) use ($user) {
            $query->whereHas('likes', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        }])
        ->paginate();

        return $contents;
    }

    public function interact($content_id,$request)
    {
        $content = Content::find($content_id);

        if (!$content) {
            return response()->json(['error' => 'Content not found'], 404);
        }

        // Check if the user has already liked or unliked this content
        $existingLike = Like::where('content_id', $content_id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if ($request->input('like') == 1) {
            if ($existingLike) {
                // User has already liked this content
                return response()->json(['error' => 'You have already liked this content']);
            } else {
                // User is liking the content for the first time
                $like = new Like();
                $like->content_id = $content_id;
                $like->user_id = auth()->user()->id;
                $like->save();
            }
        } elseif ($request->input('like') == 0) {
            if ($existingLike) {
                // User is unliking the content
                $existingLike->delete();
            } else {
                // User has not liked the content
                return response()->json(['error' => 'You have not liked this content']);
            }
        }

        // Get the updated like count for this content
        $likeCount = Like::where('content_id', $content_id)->count();
        return $likeCount;
    }
}
