<?php

namespace App\Services;

use App\Models\Page;

class PageService
{
    protected $model;

    public function __construct()
    {
        $this->model = new Page();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update(int $id, array $data)
    {
        $page = $this->model->find($id);
        return $page->update($data);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function saveImage($request, $input)
    {
        $image = $this->model->find($request->id);
        //Verifica se o banco de dados possui uma imagem salva. Caso haja, deleta do storage
        if(isset($image->image)) {
            $name = $image->image;
            $path = storage_path() .'\app\public\images\\'.$name;
            unlink($path);
        }

        $destination_path = 'public/images';
        $image = $request->file('image');
        $image_name = 'thumb';
        $extension = $image->extension();
        $path = $request->file('image')->storeAs($destination_path, "$image_name." . "$extension");
        $input['image'] = "$image_name." . "$extension";
        return $input;
    }
}
