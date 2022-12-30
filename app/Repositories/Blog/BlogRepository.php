<?php

namespace App\Repositories\Blog;

use App\Helpers\Helper;
use App\Repositories\Core\Repository;
use App\Models\Blog;
use App\Constant\Constant;
use Illuminate\Support\Facades\Log;
use Exception;

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
        try {
            $this->model = config('model-variable.models.blog.class');
        } catch (Exception $exception) {

            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('blog.something_want_wrong_try_again'));
        }
    }

    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function getBlogList()
    {
        try {
            $authId = Helper::loginuser();
            return  $this->model::orderBy('created_by', 'desc')->where('created_by', $authId)->latest('id', $authId)->paginate(Constant::STATUS_ONE);
        } catch (Exception $exception) {

            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('blog.something_want_wrong_try_again'));
        }
    }
}
