<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

class TicketController extends Controller
{

    public function index()
    {
        $users_active = User::where('status', 1)->count();
        $users_inactive = User::where('status', 0)->count();
        $users = User::All()->count();

        $data = Ticket::selectRaw(Ticket::raw('MONTHNAME(created_at) as Mes, count(id) as Chamados'))->whereBetween(Ticket::raw('MONTH(created_at)'), [1, 12])->groupBy(Ticket::raw('MONTHNAME(created_at)'))->orderBy('created_at')->get();
        $ticketsYear = json_decode($data, true);

        $ticketsDay = Ticket::where('created_at', '>=', date('Y-m-d'))->count();

        $ticketsNew = Ticket::where('status', 'like', '%novo%')->count();

        $ticketsAttendance = Ticket::where('status', 'like', '%atendimento%')->count();

        $ticketsClosed = Ticket::where('status', 'like', '%encerrado%')->count();

        $lastRequests = Ticket::select('id', 'requester', 'created_at', 'problem',)->orderByDesc('id')->limit(20)->get();

        return view('index', [
            'lastRequests' => $lastRequests,
            'ticketsDay' => $ticketsDay,
            'ticketsNew' => $ticketsNew,
            'ticketsAttendance' => $ticketsAttendance,
            'ticketsClosed' => $ticketsClosed,
            'ticketsYear' => $ticketsYear,
            'users_active' => $users_active,
            'users_inactive' => $users_inactive,
            'totalusers' => $users
        ]);
    }
    public function create()
    {
        $departments = Department::select('name', 'floor')->get();
        if (count($departments) == 0) {
            return redirect('/departamentos')->with('error', 'Cadastre ao menos 1 departamento!');
        }
        $user = auth()->user();
        $users = Ticket::select('requester')->get();
        return view('requests.create', ['user' => $user->name, 'users' => $users, 'departaments' => $departments]);
    }
    public function requests()
    {
        $Tickets = Ticket::select('id', 'requester', 'status', 'location', 'problem', 'branch_line', 'floor', 'department')->get();
        return view('requests.requests', ['Tickets' => $Tickets]);
    }
    public function show($id)
    {
        $departments = Department::select('name', 'floor')->get();
        if (count($departments) == 0) {
            return redirect('/departamentos')->with('error', 'Cadastre ao menos 1 departamento!');
        }
        if (TicketController::verifyIsNumber($id)) {
            $request = Ticket::findOrFail($id);
            return view('requests.show', ['request' => $request, 'departaments' => $departments]);
        } else {
            return redirect('/chamados')->with('error', 'Chamado não encontrado!');
        }
    }
    public function myRequests()
    {
        $user = auth()->user();
        $requests = Ticket::where('user_id', $user->id)->get();
        return view('requests.my-requests', [
            'requests' => $requests
        ]);
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

    public function store(Request $request)
    {

        $user = auth()->user();
        $newRequest = new Ticket();
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

            $list = Ticket::findOrFail($request->id);
            $path = 'img/requests/' . $list->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        Ticket::findOrFail($request->id)->update($data);
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
