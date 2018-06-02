<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\GerenciarRequestForm;

class GerenciaController extends Controller
{

    private $user;

    public function __construct(User $user) {
        $this->user = $user;
        $this->middleware('auth');
    }

    public function index() {
        $users = $this->user->all();
        return view('Admin.admin',['aeD' => 'true', 'inD' => 'in'], compact('users'));
    }

    public function edit($idUser) {
        $usere = $this->user->find($idUser);

        $users = $this->user->all();

        return view('Admin.admin',['aeD' => 'true', 'inD' => 'in'], compact('usere','users'));
    }

    public function update(GerenciarRequestForm $request, $id) {
        $dataForm = $request->all();
        $user = $this->user->find($id);
        $dataForm['password'] = bcrypt($dataForm['password']);
        $update = $user->update($dataForm);
        

        if ($update)
            return redirect()->route('admin');
        else
            return redirect()->back();
    }

    public function create(GerenciarRequestForm $request) {
        $dataForm = $request->all();
        $return = $this->user->create($dataForm);

        if ($return) {
            return redirect()->route('admin');
        } else
            return redirect()->back();
    }

    public function disable($id) {
       $user = $this->user->find($id);
       $user->enabled = 0;
       $user->save();

       return redirect()->route('admin');
    }
}
