<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $account = User::orderBy('username', 'asc')->get();
        return view('admin.account.index', compact('account'));
    }

    public function create()
    {
        return view('admin.account.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:account',
            'password' => 'required',
            'name' => 'required',
            'role' => 'required'
        ]);

        User::create($request->all());

        return redirect()->route('admin.account.index');
    }

    public function edit($username)
    {
        $account = User::find($username);
        return view('admin.account.update', compact('account'));
    }

    public function update(Request $request, $username)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'role' => 'required'
        ]);

        $account = User::find($username);
        $account->update($request->all());

        return redirect()->route('account.index');
    }

    public function destroy($username)
    {
        User::find($username)->delete();
        return redirect()->route('account.index');
    }
}
