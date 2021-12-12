<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\DocumentRequest;
use App\Http\Resources\V1\DocumentResource;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     */
    public function index()
    {
        $docs = Document::query()->paginate(20);

        return DocumentResource::collection($docs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return DocumentResource
     */
    public function store(Request $request)
    {
        $createdDoc = Document::create([
            'status'  => 'draft',
            'payload' => "{}",
        ]);

        return new DocumentResource($createdDoc);
    }

    /**
     * Publish document
     *
     * @param Request $request
     * @return DocumentResource
     */
    public function publish(Request $request)
    {
        $id  = $request->route('id');
        $doc = Document::findOrFail($id);
        $doc->status = 'published';
        $doc->save();

        return new DocumentResource($doc);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $id
     * @return DocumentResource
     */
    public function show($id)
    {
        return new DocumentResource(Document::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DocumentRequest $request
     * @param string $id
     * @return DocumentResource | Response
     */
    public function update(DocumentRequest $request, string $id)
    {
        $doc = Document::findOrFail($id);

        if ($this->isDraft($doc)) {
            $doc->update($request->validated());

            return new DocumentResource($doc);
        }

        return response('Error document is published!', 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Checked document status
     *
     * @param $doc
     * @return bool
     */
    private function isDraft($doc)
    {
        if ($doc->status === 'draft') {
            return true;
        }

        return false;
    }
}
