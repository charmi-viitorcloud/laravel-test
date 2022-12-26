<?php 

namespace App\Repositories\Core;

class Repository
{
    /**
     * @return mixed
     */
    public $model;
    public function findAll()
    {
        return $this->model::all();
    }

    /**
     * @ param array $data
     * @ return mixed
     */
    public function createblog(array $data)
    {
        return $this->model::create($data)->fresh();
    }

    /**
     * @ param int $id
     * @ param array $data
     * @ return mixed
     */
    public function update(int $id, array $data)
    {
        $blog = $this->findById($id);
        $blog->fill($data);
        $blog->save();

        return $blog->fresh();
    }

    public function findById($id)
    {
        return $this->model::find($id);
    }

    public function delete($id)
    {
        return $this->model::find($id)->delete();
    }
}
?>