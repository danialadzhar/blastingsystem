<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UserEmailImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\EmailGroup;
use App\Models\UserEmail;

class UserEmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        return view('group_email.create');
    }

    public function import_email(Request $request)
    {
        $request->validate([
            'user_email' => 'required|mimes:csv,xlsx|max:2048',
        ]);

        Excel::import(new UserEmailImport, $request->user_email);

        return redirect()->back()->with('success', 'Uploaded To Database!');
    }

    public function create_group()
    {
        return view('group_email.create_group');
    }

    public function list_group()
    {
        $count = 1;
        $email_group = EmailGroup::orderBy('id', 'Desc')->get();

        return view('group_email.list', compact('email_group', 'count'));
    }

    public function create_group_store(Request $request)
    {
        EmailGroup::create([
            'group_id' => 'GROUP_' . uniqid(),
            'group_name' => $request->group_name,
        ]);

        return redirect()->back()->with('success', 'Group Created!');
    }

    public function user_email_destroy($id)
    {
        $user_email = UserEmail::where('group_id', $id);
        $email_group = EmailGroup::where('group_id', $id);

        $user_email->delete();
        $email_group->delete();

        return redirect()->back()->with('success', 'Group & User Email Deleted!');
    }
}
