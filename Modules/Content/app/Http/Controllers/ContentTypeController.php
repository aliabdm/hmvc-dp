<?php

namespace Modules\Content\app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Content\app\Http\Requests\ContentTypeRequest;
use Modules\Content\Repositories\ContentTypeRepositories;

class ContentTypeController extends Controller
{
    private $contentTypeRepository;

    public function __construct(ContentTypeRepositories $contentTypeRepo)
    {
        $this->contentTypeRepository = $contentTypeRepo;
        $this->middleware('checkAdmin',['except' => ['index','show']]);

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contentTypes = $this->contentTypeRepository->paginate();

        return view('content::content-types.index',compact("contentTypes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content::content-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContentTypeRequest $request)
    {
        $this->contentTypeRepository->create($request->all());
        return redirect()->route('contentType.index');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $contentType = $this->contentTypeRepository->find($id);
        return view('content::content-types.show',compact("contentType"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contentType = $this->contentTypeRepository->find($id);
        return view('content::content-types.edit',compact("contentType"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->contentTypeRepository->update($request->all(),$id);
        return redirect()->route('contentType.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->contentTypeRepository->delete($id);
        return redirect()->route('contentType.index');
    }
}
