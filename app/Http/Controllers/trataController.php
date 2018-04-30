<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Fonte;
use App\Model\Doenca;
use App\Model\Equip;
use App\Model\Trata;

class trataController extends Controller
{
    private $fonte;
    private $doenca;
    private $equip;
    private $trata;

    public function __construct(Fonte $fonte, Doenca $doenca, Equip $equip, Trata $trata) {
        $this->fonte = $fonte;
        $this->doenca = $doenca;
        $this->equip = $equip;
        $this->trata = $trata;
        
    }

    public function index() {
        $fontes = $this->fonte->all();
        $fontes2 = DB::select('select distinct nm_fonte from fontes');
        $doencas = $this->doenca->all();
        $doencas2 = DB::select('select distinct cid from doencas');
        $equips = $this->equip->all();
        $equips2 = DB::select('select distinct nm_equip from equips');
        $tratas = $this->trata->all();
        $fab = DB::select('SELECT DISTINCT nm_fabricante from equips');
        return view('Dash.index', ['aeT' => 'true', 'inT' => 'in'], compact('tratas', 'fontes', 'fontes2', 'doencas', 'doencas2', 'equips', 'equips2', 'tratas', 'fab'));
    }

    public function create() {
        
    }

    public function store(request $request) {
        $dataForm = $request->all();
        $return = $this->trata->create($dataForm);

        if ($return) {
            return redirect()->route('trata.index')->with('success-T', 'cadastrado');
        } else
            return redirect()->back();
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $trata = $this->trata->find($id);
        $tratas = $this->trata->all();
        $fontes = $this->fonte->all();
        $fontes2 = DB::select('select distinct nm_fonte from fontes');
        $doencas = $this->doenca->all();
        $doencas2 = DB::select('select distinct cid from doencas');
        $equips = $this->equip->all();
        $equips2 = DB::select('select distinct nm_equip from equips');
        $fab = DB::select('SELECT DISTINCT nm_fabricante from equips');
        return view('Dash.index', ['aeT' => 'true', 'inT' => 'in'], compact('tratas', 'trata', 'fontes', 'fontes2', 'doencas', 'doencas2', 'equips', 'equips2', 'tratas', 'fab'));
    }

    public function update(request $request, $id) {
        $dataForm = $request->all();
        $doenca = $this->trata->find($id);
        $update = $doenca->update($dataForm);

        if ($update):
            return redirect()->route('trata.index')->with('success-T', 'alterado');
        else:
            return redirect()->back()->with(['errors' => 'Falha ao editar']);
        endif;
    }

    public function destroy($id) {
        //
    }

}