<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Fonte;
use App\Model\Doenca;
use App\Model\Equip;
use App\Model\Trata;
use App\Http\Requests\FonteRequestForm;

class FonteController extends Controller {

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
        return view('Dash.index', ['aeF' => 'true', 'inF' => 'in'], compact('fontes', 'fontes2', 'doencas', 'doencas2', 'equips', 'equips2', 'tratas', 'fab'));
    }

    public function create() {
        
    }

    public function store(FonteRequestForm $request) {
        $dataForm = $request->all();
        $return = $this->fonte->create($dataForm);

        if ($return) {
            return redirect()->route('fonte.index')->with('success-F', 'cadastrado');
        } else
            return redirect()->back();
    }

    public function show($id) {
        //
    }

    public function edit($id_fonte) {
        $font = $this->fonte->find($id_fonte);
        $fontes = $this->fonte->all();
        $fontes2 = $this->fonte->all(['nm_fonte']);
        $doencas = $this->doenca->all();
        $doencas2 = $this->doenca->all(['cid']);
        $equips = $this->equip->all();
        $equips2 = $this->equip->all(['nm_equip']);
        $tratas = $this->trata->all();
        
        $fab = DB::select('SELECT DISTINCT nm_fabricante from equips');
        return view('Dash.index', ['aeF' => 'true', 'inF' => 'in'], compact('font', 'fontes', 'fontes2', 'doencas', 'doencas2', 'equips', 'equips2', 'tratas', 'fab'));
    }

    public function update(FonteRequestForm $request, $id_fonte) {
        $dataForm = $request->all();
        $fonte = $this->fonte->find($id_fonte);
        $update = $fonte->update($dataForm);

        if ($update):
            return redirect()->route('fonte.index')->with('success-F', 'alterado');
        else:
            return redirect()->back()->with(['errors' => 'Falha ao editar']);
        endif;
    }

    public function destroy($id) {
        //
    }
    
    public function apiFontes() {
        return $this->fonte->all();
    }

}
