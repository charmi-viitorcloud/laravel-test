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
     * Show the form for creating a new .
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model::create($data)->fresh();
    }

    /**
     * Update the specified in storage.

     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data)
    {
        $blog = $this->findById($id);
        $blog->fill($data);
        $blog->save();

        return $blog->fresh();
    }

    /**
     * @param int $id
     * @return mixed
     */

    public function findById($id)
    {
        return $this->model::find($id);
    }

     /**
     * Remove the specified from storage.
     *
     * @param mixed
     */
    public function delete($id)
    {
        return $this->model::find($id)->delete();
    }
}
?>