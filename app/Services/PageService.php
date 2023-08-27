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
}
