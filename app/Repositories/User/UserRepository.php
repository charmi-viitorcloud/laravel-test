<?php

namespace App\Repositories\User;

use App\Repositories\Core\Repository;
use App\Models\User;
use App\Constant\Constant;
use Illuminate\Support\Facades\Log;
use Exception;


class UserRepository extends Repository
{
    /**
     * @var string
     * Return the model
     */
    public function __construct()
    {
        try{
            $this->model = config('model-variable.models.user.class');
        }catch (Exception $exception) {

            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('blog.something_want_wrong_try_again'));
        }
    }

    /**
     * get user listing
     * 
     * @return array
     */
    public function getUserList()
    {
        try {
            return  $this->model::paginate(Constant::STATUS_THREE);
        } catch (Exception $exception) {

            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('blog.something_want_wrong_try_again'));
        }
    }
}
