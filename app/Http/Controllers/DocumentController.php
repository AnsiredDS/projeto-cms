<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Services\DocumentService;
use App\Http\Requests\StoreDocumentRequest;

class DocumentController extends Controller
{
    protected $documentService;
    public function __construct()
    {
        $this->documentService = new DocumentService();
    }

    public function all()
    {
        return $this->documentService->all();
    }

    public function create(StoreDocumentRequest $request)
    {

        $input = $request->all();
        $input = $this->documentService->saveDocument($request, $input);

        if(Document::where('document_title', $input['document_title'])->exists())
        {
            return redirect()
                ->back()
                ->with('error', 'Documento com o mesmo nome já existe!');
        }

        $this->documentService->create($input);
        return redirect()
            ->back()
            ->with('status', 'Documento criado com sucesso!');

    }

    public function destroy(int $id)
    {
        $this->documentService->delete($id);
        return redirect()
            ->back()
            ->with('status', 'Documento deletado com sucesso');
    }

    public function download(string $name)
    {
        $document = storage_path() .'\app\public\docs\\'.$name;
        return response()->download($document, $name);
    }
}
