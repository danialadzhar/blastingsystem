<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Models\EmailGroup;
use App\Models\UserEmail;
use App\Models\EmailCron;
use Auth;

class EmailBlastingController extends Controller
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
    
    public function email_template()
    {
        $count = 1;
        $email_template = EmailTemplate::orderBy('id', 'Desc')->get();

        return view('email_blast.email_template', compact('email_template', 'count'));
    }

    public function create_template()
    {
        return view('email_blast.create_template');
    }

    public function email_template_store(Request $request)
    {
        EmailTemplate::create([
            'title' => $request->title,
            'email_content' => $request->email_content,
        ]);

        return redirect('email/template')->with('success', 'Email Template Saved!');
    }

    public function email_blast()
    {   
        $email_group = EmailGroup::orderBy('id', 'Desc')->get();
        $email_template = EmailTemplate::orderBy('id', 'Desc')->get();

        return view('email_blast.email-blast', compact('email_group', 'email_template'));
    }

    public function send_mail(Request $request)
    {
        $template = EmailTemplate::where('id', $request->email_template)->first();
        $group = EmailGroup::where('group_id', $request->email_group)->first();
        $user_email = UserEmail::where('group_id', $request->email_group)->get();

        // If takde email dalam User Email akan keluar error.
        if($user_email->isEmpty())
        {
            return redirect()->back()->with('error', 'No Email found in ' . $group->group_name);

        }else{

            EmailCron::create([
                'email_id' => 'email_' . uniqid(),
                'subject' => $template->title,
                'email_content' => $template->email_content,
                'group_id' => $group->group_id,
                'email_from' => Auth::user()->email,
                'name_from' => Auth::user()->name,

            ]);

            // $details = [
            //     'subject' => $template->title,
            //     'email_content' => $template->email_content,
            //     'group_id' => $group->group_id,
            //     'email_from' => Auth::user()->email,
            //     'name_from' => Auth::user()->name,
            // ];

            // $job = (new \App\Jobs\SendQueueEmail($details))->delay(now()->addSeconds(2));

            // dispatch($job);

            return redirect()->back()->with('success', 'Email Will Deliver In 2 Minutes');

        }
    }

    public function email_template_destroy($id)
    {
        $email_template = EmailTemplate::where('id', $id);

        $email_template->delete();

        return redirect()->back()->with('success', 'Email Template Deleted!');
    }
}
