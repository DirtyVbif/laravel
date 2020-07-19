<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => t('Users list'),
            'page_title' => t('Users list'),
            'users' => User::all()
        ];

        return view('admin/users/list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data = [
            'title' => t(sprintf("ID:%d user profile edit", $user->id)),
            'page_title' => t(sprintf('ID:%d user "%s" profile edit', $user->id, $user->name)),
            'user' => $user,
            'statuses' => UserStatus::all()->where('usid', '>', 1)
        ];
        
        return view('admin/users/form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $max_usid = UserStatus::all()->max('usid');
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'usid' => ['required', 'numeric', 'min:2', "max:$max_usid"]
        ]);
        $user->fill($data);
        if($user->save()) {
            return redirect('/admin/user')
                ->with('status', sprintf(t('Account ID:%d "%s" successfully updated'), $user->id, $user->name));
        }
        return redirect('/admin/user')
            ->back()
            ->with('status', sprintf(t('Failed to update accound ID:%d "%s"'), $user->id, $user->name));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back();
    }
}
