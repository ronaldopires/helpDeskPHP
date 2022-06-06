<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListRequest;

class RequestController extends Controller
{

    public function index()
    {
        $data = ListRequest::selectRaw(ListRequest::raw('MONTHNAME(created_at) as Mes, count(id) as Chamados'))->whereBetween(ListRequest::raw('MONTH(created_at)'), [1, 12])->groupBy(ListRequest::raw('MONTHNAME(created_at)'))->orderBy('created_at')->get();
        $requestYear = json_decode($data, true);

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
            'closed' => $closed,
            'requestYear' => $requestYear
        ]);
    }
    public function create()
    {
        $user = auth()->user();
        $users = ListRequest::select('requester')->get();
        return view('requests.create', ['user' => $user->name, 'users' => $users]);
    }
    public function requests()
    {
        $listRequests = ListRequest::select('id', 'requester', 'status', 'location', 'problem', 'branch_line', 'floor', 'department')->get();
        return view('requests.requests', ['listRequests' => $listRequests]);
    }
    public function show($id)
    {
        if (RequestController::verifyIsNumber($id)) {
            $user = auth()->user();
            $request = ListRequest::findOrFail($id);
            return view('requests.show', ['request' => $request, 'user' => $user->name]);
        } else {
            return redirect('/chamados')->with('error', 'Chamado não encontrado!');
        }
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

        $user = auth()->user();
        $newRequest = new ListRequest();
        $newRequest->created_by = $user->name;
        $newRequest->requester = $request->requester;
        $newRequest->requester_email = $request->requester_email;
        $newRequest->problem = $request->problem;
        $newRequest->origin_of_requisition = $request->origin_of_requisition;
        $newRequest->status = $request->status;
        $newRequest->department = $request->department;
        $newRequest->floor = $request->floor;
        $newRequest->branch_line = $request->branch_line;
        $newRequest->location = $request->location;
        $newRequest->observation = $request->observation;
        $newRequest->image = $request->image;
        $newRequest->priority = $request->priority;
        $newRequest->user_id = $user->id;

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
            return redirect('/chamados')->with('error', 'Erro na requisição erro:', $th);
        }
    }
    public function addRequest($id)
    {
        if (RequestController::verifyIsNumber($id)) {
            echo "\"{$id}\" is a number.";
        } else {
            echo "\"{$id}\" is not a number.";
        }

        exit;
        // return redirect('/meus-chamados')->with('success', 'Chamado adicionado a sua fila!');
    }

    public function update(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            if (($extension != 'jpg') && ($extension != 'png') && ($extension != 'jpeg')) {
                return redirect('/chamados')->with('error', 'Extensão inválida! Envie somente arquivos .jpg, .png e .jpeg');
            } else {
                $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

                $requestImage->move(public_path('img/requests'), $imageName);
                $data['image'] = $imageName;
            }

            $list = ListRequest::findOrFail($request->id);
            $path = 'img/requests/' . $list->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        ListRequest::findOrFail($request->id)->update($data);
        return redirect('/chamados')->with('success', 'Chamado editado com sucesso!');
    }

    public function verifyIsNumber($number)
    {
        if (is_numeric($number))
            return $number;
        else
            return false;
    }
}
