<?php

namespace App\Services\Blog;
namespace App\Services;

use App\Constant\Constant;
use App\Models\Blog;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

/**
 *
 * Class BlogService
 * @package App\Services\Blog\
 */
class BlogService extends BaseService
{
    /**
     * Associated Service Model.
     */
    protected const MODEL = Blog::class;

    /**
     * This function is use for search query in Datatable.
     * Also for sorting function
     *
     * @param $request
     * @return $this|array|\Illuminate\Database\Eloquent\Builder|static
     */
    public function prepareSearchQuery($request)
    {
        $searchQuery = [];
        try {
            $searchQuery = $this->query();

            $columns = ['', 'id', 'title', 'status','created_at', 'updated_at'];

            if (isset($request['order']) && $request['order'] != "") {
                $searchQuery = $searchQuery->orderBy(
                    $columns[$request['order'][0]['column']],
                    $request['order'][0]['dir']
                );
            }

        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }

        return $searchQuery;
    }

    /**
     * This function is for the format the Datatable columns
     *
     * @param array $request
     * @return object
     */
    public function getForDataTable(array $request): object
    {
        $response = (object)[];
        try {
            $dataTableQuery = $this->prepareSearchQuery($request)
                ->orderBy('id', 'DESC');

            $response = DataTables::of($dataTableQuery)
                ->editColumn('title', function ($blog) {
                    return ucwords($blog->title) ?? null;
                })
                ->editColumn('status', function ($blog) {
                    if ($blog->status === Constant::STATUS_ONE) {
                        return '<span class="label label-lg label-success label-inline">' . Constant::STATUS_ACTIVE . '</span>';
                    } else {
                        return '<span class="label label-lg label-danger label-inline">' . Constant::STATUS_INACTIVE . '</span>';
                    }
                })
                ->editColumn('created_by', function ($blog) {
                    return $blog->user->fullname ?? "-";
                })
                ->editColumn('created_at', function ($blog) {
                    return !empty($blog->created_at) ? defaultDateFormat($blog->created_at) : '';
                })
                ->editColumn('updated_at', function ($blog) {
                    return !empty($blog->updated_at) ? defaultDateFormat($blog->updated_at) : '';
                })
                ->addColumn('action', function ($blog) {
                    return view('backend.blog.partials.action', compact('blog'));
                })
                ->addIndexColumn()
                ->rawColumns(['title','status', 'created_at', 'updated_at','action'])
                ->make(true);

        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }

        return $response;
    }

    /**
     * @param array $request
     * @return mixed
     */
    public function create(array $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $blog = $this->query()->create([
                    'user_id' => !empty(loggedInUser()->id) ? loggedInUser()->id : Constant::NULL,
                    'title' => $request['title'],
                    'description' => $request['description'],
                    'status' => isset($request['status']) ? Constant::STATUS_ONE : Constant::STATUS_ZERO,
                    'created_by' => !empty(loggedInUser()->id) ? loggedInUser()->id : Constant::NULL,
                    'updated_by' => !empty(loggedInUser()->id) ? loggedInUser()->id : Constant::NULL,
                ]);

                $activityLogName = Constant::BLOG_ACTIVITY_LOG;
                $activityLogStatus = Constant::CREATE_BLOG_ACTIVITY_LOG;
                $user = loggedInUser();

                //created activity log
                activity($activityLogName)
                    ->performedOn($blog)
                    ->causedBy($user)
                    ->withProperties([
                        'attributes' => [
                            'message' => __('message.create_blog_success'),
                            'data' => $blog
                        ]
                    ])
                    ->log($activityLogStatus);

                return $blog;
            });
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return Constant::STATUS_FALSE;
        }
    }

    /**
     * @param object $blog
     * @param array $request
     * @return mixed
     */
    public function update(object $blog, array $request)
    {
        try {
            return DB::transaction(function () use ($blog, $request) {
                $this->query()->where('id', $blog->id)->update([
                    'user_id' => !empty(loggedInUser()->id) ? loggedInUser()->id : Constant::NULL,
                    'title' => $request['title'],
                    'description' => $request['description'],
                    'status' => isset($request['status']) ? Constant::STATUS_ONE : Constant::STATUS_ZERO,
                    'updated_by' => !empty(loggedInUser()->id) ? loggedInUser()->id : Constant::NULL,
                ]);

                $activityLogName = Constant::BLOG_ACTIVITY_LOG;
                $activityLogStatus = Constant::UPDATE_BLOG_ACTIVITY_LOG;
                $user = loggedInUser();

                //created activity log
                activity($activityLogName)
                    ->performedOn($blog)
                    ->causedBy($user)
                    ->withProperties([
                        'attributes' => [
                            'message' => __('message.update_blog_success'),
                            'data' => $blog
                        ]
                    ])
                    ->log($activityLogStatus);
                return $blog;
            });
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return Constant::STATUS_FALSE;
        }
    }

    /**
     * This function is for the delete records into table
     *
     * @param object $blog
     * @return bool
     */
    public function destroy(object $blog): bool
    {
        try {
            return DB::transaction(function () use ($blog) {
                $blog->delete();

                $activityLogName = Constant::BLOG_ACTIVITY_LOG;
                $activityLogStatus = Constant::DELETE_BLOG_ACTIVITY_LOG;
                $user = loggedInUser();

                //created activity log
                activity($activityLogName)
                    ->performedOn($blog)
                    ->causedBy($user)
                    ->withProperties([
                        'attributes' => [
                            'message' => __('message.delete_blog_success'),
                            'data' => $blog
                        ]
                    ])
                    ->log($activityLogStatus);

                return Constant::STATUS_TRUE;
            });
        } catch (\Exception $ex) {
            Log::error($ex);
            return Constant::STATUS_FALSE;
        }
    }
}