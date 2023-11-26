<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function proceedWithPassword(Request $request, string $action)
    {
        dd($action);
        $action = $request->input('action');

        if (!$action) {
            return back();
        }
        $requests = $request->except(['_token', 'action']);

        return view('users.proceed-with-passowrd', compact('action', 'requests'));
    }
}
