<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PageService;

class PageController extends Controller
{
    protected $pageService;

    public function __construct()
    {
        $this->pageService = new PageService();
    }

    public function index()
    {
        $pageData = $this->pageService->all();
        // dd($pageData->first()->title);
        return view('home', compact('pageData'));
    }

    public function edit()
    {
        $pageData = $this->pageService->all();
        return view('cms', compact('pageData'));
    }

    public function update(int $id, Request $request)
    {
        $input = $request->all();
        if($request->hasFile('image'))
        {
            $destination_path = 'public/images';
            $image = $request->file('image');
            $image_name = 'thumb';
            $extension = $image->extension();
            $path = $request->file('image')->storeAs($destination_path, "$image_name." . "$extension");
            $input['image'] = "$image_name." . "$extension";
        }

        $this->pageService->update($id, $input);
        return redirect()
            ->back()
            ->with('status', 'Atualizado com sucesso!');
    }

    public function create(Request $request)
    {
        if($request->hasFile('image'))
        {
            $destination_path = 'public/images';
            $image = $request->file('image');
            $image_name = 'thumb';
            $path = $request->file('image')->storeAs($destination_path, $image_name);
            $request->all()['image'] = $image_name;
        }

        $this->pageService->create($request->all());
        return redirect()
            ->back()
            ->with('status', 'Criado com sucesso!');
    }
}
