<?php

namespace App\Services;

use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentService
{
    protected $model;

    public function __construct()
    {
        $this->model = new Document();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function delete(int $id):void
    {
        $document = $this->model->find($id);
        $name = $document->document_title;
        $path = storage_path() .'\app\public\docs\\'.$name;;
        unlink($path);
        $document->delete();
    }

    public function saveDocument($request, $input)
    {
        $destination_path = 'public/docs';
        $document = $request->file('document_title');
        $document_name = $document->getClientOriginalName();
        $path = $request->file('document_title')->storeAs($destination_path, $document_name);
        $input['document_title'] = $document->getClientOriginalName();
        return $input;
    }
}
