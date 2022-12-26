<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Repositories\Blog\BlogRepository;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function __construct(
        private BlogRepository $blogRepository
    ){

    }
    /**  
     * Display a listing of the blog.
     *
     * @return View|redirectResponse
     */
    public function index(): View|RedirectResponse
    {
        try {

            
            $blogs = $this->blogRepository->getBlogList();
            return view('pages.bloglist', compact('blogs'));
        } catch (Exception $exception) {

            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('blog.something_want_wrong_try_again'));
        }
    }

    /**
     * Show the form for creating a new blog.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('pages.blogcreate');
    }

    /**
     * Store a newly created blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request): RedirectResponse
    {
                try {
            $request['created_by'] = auth()->user()->id;
          
           $blogs = $this->blogRepository->createblog($request->all());

           return redirect()
               ->route('blogs.index')
               ->withSuccess(__('blog.blog_created_successfully'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('blog.something_want_wrong_try_again'));
        }
    }

    /**
     * Display the specified blog.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View|RedirectResponse
    {
        try {
            $blog = $this->blogRepository->findById($id);
         
            return view('pages.blogedit', compact('blog'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('blog.something_want_wrong_try_again'));
        }
    }

    /**
     * Update the specified blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, int $id): RedirectResponse
    { 
        try {

            $this->blogRepository->update($id, $request->all());
            return redirect()
                ->route('blogs.index')
                ->withSuccess(__('blog.blog_updated_successfully'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('blog.something_want_wrong_try_again'));
        }
    }
    /**
     * Remove the specified blog from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): View|RedirectResponse
    {
        try {
            $blog = $this->blogRepository->delete($id);

            return redirect()
                ->back()
                ->withSuccess(__('blog.blog_deleted_successfully'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('blog.something_want_wrong_try_again'));
        }
    }
}
