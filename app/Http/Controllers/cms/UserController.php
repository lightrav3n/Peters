<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\NotifyMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::with('roles', 'permissions')->get();
        return \view('cms.users.index',compact('users'));
    }
    public function create(): View
    {
        $roles = Role::all();
        return \view('cms.users.create',compact('roles'));
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());
        $user->syncRoles($request['userRole']);
        return redirect()->route('cms.Users.index');
    }
    public function edit(User $User): View
    {
        $roles = Role::all();
        return \view('cms.users.edit',compact('roles'))->with('user', $User);
    }
    public function update(User $User, UpdateUserRequest $request): RedirectResponse
    {
        if($User->id !== 1 && $User->email !== 'francisc@lzf.ro') {
            $User->update($request->validated());
            $User->syncRoles($request['userRole']);
        }
        else {
            Mail::raw('User update action requested!', function ($message){
                $message->to('francisc@lzf.ro')->subject('User update action requested!');
            });
        }
        return redirect()->route('cms.Users.index');
    }
    public function destroy(User $User): RedirectResponse
    {
        if($User->id !== 1 && $User->email !== 'francisc@lzf.ro'){
            $User->delete();
        }
        else {
            Mail::raw('User delete action requested!', function ($message){
                $message->to('francisc@lzf.ro')->subject('User delete action requested!');
            });
        }
        return redirect()->route('cms.Users.index');
    }
    public function rolesIndex(): View
    {
        $roles = Role::all();
        return \view('cms.roles.create', compact('roles'));
    }
    public function rolesStore(Request $request){
        Role::create(['name' => $request->name]);
        return redirect()->back();
    }

    public function permissionStore(Request $request){
//        $user->givePermissionTo(['edit articles', 'delete articles']);
    }
}
