<?php

namespace App\Http\Controllers;

use App\Imports\IssuesImport;
use App\Issue;
use App\User;
use App\Mail\IssueRequestSubmitted;
use Illuminate\Http\Request;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class IssuesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
     
        $data['users'] = User::all();

        return view('issues.list', $data);

    }

    public function store(Request $request)
    {
        //return $request;
        
        $issue = new Issue();
        $issue->name = $request->name;
        $issue->email = $request->email;
        $issue->phone = $request->phone;
        $issue->msg = $request->message;
        $issue->building_number = $request->building_number;
        $issue->apartment_number = $request->apartment_number;
        $issue->user_id = Auth::user()->id;
        $issue->attachment = null;
        $issue->save();

        \Mail::to($issue->email)->send(new IssueRequestSubmitted($issue));
        return "Record is created successfully";
        
    }

    public function importFromExcel(Request $request) 
    {
        Excel::import(new IssuesImport, $request->excelFile);
        
        return "Data imported successfully";
    }
}
