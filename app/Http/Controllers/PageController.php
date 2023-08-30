<?php

namespace App\Http\Controllers;

use App\Services\PageService;
use App\Http\Requests\UpdatePageRequest;

class PageController extends Controller
{
    protected $pageService, $documentController;

    public function __construct()
    {
        $this->pageService = new PageService();
        $this->documentController = new DocumentController();
    }

    public function index()
    {
        $pageData = $this->pageService->all();
        $documents = $this->documentController->all();
        return view('home', compact('pageData', 'documents'));
    }

    public function edit()
    {
        $pageData = $this->pageService->all();
        $documents = $this->documentController->all();
        return view('cms', compact('pageData', 'documents'));
    }

    public function update(int $id, UpdatePageRequest $request)
    {
        $input = $request->all();

        if($request->hasFile('image')) {
            $input = $this->pageService->saveImage($request, $input);
        }

        $this->pageService->update($id, $input);
        return redirect()
            ->back()
            ->with('status', 'Atualizado com sucesso!');
    }

    public function create(UpdatePageRequest $request)
    {
        $input = $request->all();
        if($request->hasFile('image')) {
            $input = $this->pageService->saveImage($request, $input);
        }

        $this->pageService->create($input);
        return redirect()
            ->back()
            ->with('status', 'Criado com sucesso!');
    }
}
