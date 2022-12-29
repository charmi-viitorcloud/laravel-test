<?php

namespace App\Repositories\Blog;

use App\Repositories\Core\Repository;
use App\Models\Blog;
use App\Constant\Constant;

class BlogRepository extends Repository
{
    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        $this->model = CONSTANT::BlOG;
    }

     /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function getBlogList()
    {
        $authId = auth()->user()->id;
        return  $this->model::orderBy('created_by', 'desc')->where('created_by', $authId)->latest('id', $authId)->paginate(Constant::STATUS_ONE);
    }
}
