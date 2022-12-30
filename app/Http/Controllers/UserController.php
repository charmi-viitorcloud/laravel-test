<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }
    /**  
     * Display a listing of the blog.
     *
     * @return View|redirectResponse
     */
    public function index(): View|RedirectResponse
    {
        try {
            $users = $this->userRepository->getUserList();
            return view('pages.list', compact('users'));
        } catch (Exception $exception) {

            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('user.something_want_wrong_try_again'));
        }
    }

    /**
     * Show the form for creating a new blog.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('pages.create');
    }

    /**
     * Store a newly created blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        try {
            $request['password'] = Hash::make($request['password']);

            $users = $this->userRepository->create($request->all());
            return redirect()
                ->route('users.index')
                ->withSuccess(__('user.user_created_successfully'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('user.something_want_wrong_try_again'));
        }
    }

    /**
     * Display the specified blog.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
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
            $user = $this->userRepository->findById($id);

            return view('pages.edit', compact('user'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('user.something_want_wrong_try_again'));
        }
    }

    /**
     * Update the specified blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, int $id): RedirectResponse
    {
        try {
            $this->userRepository->update($id, $request->all());
            return redirect()
                ->route('users.index')
                ->withSuccess(__('user.user_updated_successfully'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('user.something_want_wrong_try_again'));
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
            $user = $this->userRepository->delete($id);

            return redirect()
                ->back()
                ->withSuccess(__('user.user_deleted_successfully'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('user.something_want_wrong_try_again'));
        }
    }
}
