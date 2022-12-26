<?php

namespace App\Repositories\Blog;

use App\Repositories\Core\Repository;
use App\Models\Blog;
use App\Constant\Constant;

class BlogRepository extends Repository
{
    /**
     * @var string
     * Return the model
     */
    public function __construct()
    {
        $this->model = CONSTANT::BlOG;
    }

    /**
     * get blog listing
     * 
     * @return array
     */
    public function getBlogList():array
    {       
        $authId = auth()->user()->id;
       return  $this->model::orderBy('created_by','desc')->where('created_by',$authId)->get()->toArray();
     
    }

     /**
     * get blog listing
     * 
     * @return array
     */
    // public function createblog():array
    // {       
    //    dd("helo all");
    // }
}