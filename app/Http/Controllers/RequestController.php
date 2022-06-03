<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListRequest;
use Cron\DayOfWeekField;

class RequestController extends Controller
{
    public function index()
    {
        $requestDay = ListRequest::where('created_at', '>=', date('Y-m-d'))->count();

        $requestNew = ListRequest::where('status', 'like', '%novo%')->count();

        $attendance = ListRequest::where('status', 'like', '%atendimento%')->count();

        $closed = ListRequest::where('status', 'like', '%encerrado%')->count();

        $lastRequests = ListRequest::select('id', 'requester', 'created_at', 'problem', 'branch_line', 'floor', 'department')->orderByDesc('id')->limit(20)->get();

        return view('index', [
            'lastRequests' => $lastRequests,
            'requestDay' => $requestDay,
            'requestNew' => $requestNew,
            'attendance' => $attendance,
            'closed' => $closed
        ]);
    }
    public function create()
    {
        return view('requests.create');
    }
    public function requests()
    {
        $listRequests = ListRequest::select('id', 'requester', 'status', 'location', 'problem', 'branch_line', 'floor', 'department')->get();
        return view('requests.requests', ['listRequests' => $listRequests]);
    }
    public function show($id)
    {
        $request = ListRequest::findOrFail($id);
        return view('requests.show', ['request' => $request]);
    }
    public function myRequests()
    {
        return view('requests.my-requests');
    }
    public function profile()
    {
        return view('profile');
    }
    public function help()
    {
        return view('help');
    }
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
    public function config()
    {
        return view('layouts.config');
    }
    public function store(Request $request)
    {
        $newRequest = new ListRequest();
        $newRequest->created_by = $request->created_by;
        $newRequest->requester = $request->requester;
        $newRequest->requester_email = $request->requester_email;
        $newRequest->problem = $request->problem;
        $newRequest->origin_of_requisition = $request->origin_of_requisition;
        $newRequest->problem = $request->problem;
        $newRequest->status = $request->status;
        $newRequest->department = $request->department;
        $newRequest->floor = $request->floor;
        $newRequest->branch_line = $request->branch_line;
        $newRequest->location = $request->location;
        $newRequest->observation = $request->observation;
        $newRequest->image = $request->image;
        $newRequest->priority = $request->priority;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $requestImage->move(public_path('img/requests'), $imageName);
            $newRequest->image = $imageName;
        }

        try {
            $newRequest->save();
            return redirect('/chamados')->with('success', 'Exito na requisição!');
        } catch (\Throwable $th) {
            return redirect('/chamados')->with('error', `Erro na requisição erro:{$th}`);
        }
    }
}
