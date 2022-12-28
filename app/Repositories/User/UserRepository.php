<?php

namespace App\Repositories\User;

use App\Repositories\Core\Repository;
use App\Models\User;
use App\Constant\Constant;

class UserRepository extends Repository
{
    /**
     * @var string
     * Return the model
     */
    public function __construct()
    {
        $this->model = CONSTANT::USER;
    }

    /**
     * get user listing
     * 
     * @return array
     */
    public function getUserList()
    {       
        // $authId = auth()->user()->id;
        
       return  $this->model::paginate(Constant::STATUS_THREE);

    //    $user = User::paginate(Constant::STATUS_TEN);

    
    }
}