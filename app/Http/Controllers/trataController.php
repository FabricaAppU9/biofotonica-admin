<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Fonte;
use App\Model\Doenca;
use App\Model\Equip;
use App\Model\Trata;
use App\Model\Configuracoes;

class trataController extends Controller
{
    private $fonte;
    private $doenca;
    private $equip;
    private $trata;
    private $config;

    public function __construct(Fonte $fonte, Doenca $doenca, Equip $equip, Trata $trata, Configuracoes $config) {
        $this->fonte = $fonte;
        $this->doenca = $doenca;
        $this->equip = $equip;
        $this->trata = $trata;
        $this->config = $config;
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
        $fontes = $this->fonte->all();
        $fontes2 = $this->fonte->all(['nm_fonte']);
        $doencas = $this->doenca->all();
        $doencas2 = $this->doenca->all(['cid']);
        $equips = $this->equip->all();
        $equips2 = $this->equip->all(['nm_equip']);
        $tratas = $this->trata->all();
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

    public function disable($id) {
        $trata = $this->trata->find($id);
        $trata->enabled = 0;

        $trata->save();

        return redirect()->route('trata.index');
    }
  
    public function apiTrata(Request $request) {
        return $this->config->geraConfigs($request);
    }
    

}