<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Fonte;
use App\Model\Doenca;
use App\Model\Equip;
use App\Model\Trata;
use App\Http\Requests\DoencaRequestForm;
use Illuminate\Support\Facades\DB;

class DoencaController extends Controller {

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
        $fontes2 = $this->fonte->all(['nm_fonte']);
        $doencas = $this->doenca->all();
        $doencas2 = $this->doenca->all(['cid']);
        $equips = $this->equip->all();
        $equips2 = $this->equip->all(['nm_equip']);
        $tratas = $this->trata->all();
        
        $fab = DB::select('SELECT DISTINCT nm_fabricante from equips');
        return view('Dash.index', ['aeD' => 'true', 'inD' => 'in'], compact('fontes', 'fontes2', 'doencas', 'doencas2', 'equips', 'equips2', 'tratas', 'fab'));
    }

    public function create() {
        
    }

    public function store(DoencaRequestForm $request) {
        $dataForm = $request->all();
        $return = $this->doenca->create($dataForm);

        if ($return) {
            return redirect()->route('doenca.index')->with('success-D', 'cadastrado');
        } else
            return redirect()->back();
    }

    public function show($id) {
        //
    }

    public function edit($cid) {
        $doe = $this->doenca->find($cid);

        $fontes = $this->fonte->all();
        $fontes2 = $this->fonte->all(['nm_fonte']);
        $doencas = $this->doenca->all();
        $doencas2 = $this->doenca->all(['cid']);
        $equips = $this->equip->all();
        $equips2 = $this->equip->all(['nm_equip']);
        $tratas = $this->trata->all();
        
        $fab = DB::select('SELECT DISTINCT nm_fabricante from equips');
        return view('Dash.index', ['aeD' => 'true', 'inD' => 'in'], compact('doe', 'fontes', 'fontes2', 'doencas', 'doencas2', 'equips', 'equips2', 'tratas', 'fab'));
    }

    public function update(DoencaRequestForm $request, $cid) {
        $dataForm = $request->all();
        $doenca = $this->doenca->find($cid);
        $update = $doenca->update($dataForm);

        if ($update):
            return redirect()->route('doenca.index')->with('success-D', 'alterado');
        else:
            return redirect()->back()->with(['errors' => 'Falha ao editar']);
        endif;
    }

    public function destroy($id) {
        //
    }

    public function apiDoencas($fonte) {

        return DB::select("SELECT d.cid,d.nome_doenca FROM `tratas` t JOIN doencas
         d ON (t.cid = d.cid) WHERE nm_fonte = '$fonte' GROUP BY d.cid,d.nome_doenca");
    }
    
}
