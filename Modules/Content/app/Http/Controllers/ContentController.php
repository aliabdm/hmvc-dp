<?php

namespace Modules\Content\app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Content\app\Http\Requests\ContentRequest;
use Modules\Content\app\Models\ContentType;
use Modules\Content\Repositories\ContentRepositories;

class ContentController extends Controller
{
    private $contentRepository;

    public function __construct(ContentRepositories $contentRepo)
    {
        $this->contentRepository = $contentRepo;
        $this->middleware('checkAdmin',['except' => ['index','show','youMayLike','interact']]);

    }
    public function index()
    {
        $contents = $this->contentRepository->paginateWithEagerRelation();
        $viewBasedOnUser = $this->contentRepository->viewBasedOnUser();
        return view('content::content.'.$viewBasedOnUser,compact("contents"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contentTypes = ContentType::all();
        return view('content::content.create',compact("contentTypes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContentRequest $request)
    {
        $this->contentRepository->create($request->all());
        return redirect()->route('content.index');

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $content = $this->contentRepository->find($id);
        return view('content::content.show',compact("content"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $content = $this->contentRepository->find($id);
        $contentTypes = ContentType::all();
        return view('content::content.edit',compact("content","contentTypes"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContentRequest $request, $id)
    {
        $this->contentRepository->update($request->all(),$id);
        return redirect()->route('content.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->contentRepository->delete($id);
        return redirect()->route('content.index');
    }

    public function youMayLike()
    {
        $contents = $this->contentRepository->youMayLike();
        return view('content::content.you-may-like',compact("contents"));
    }

    public function interact($content_id,Request $request)
    {
        return $this->contentRepository->interact($content_id,$request);
    }

}
