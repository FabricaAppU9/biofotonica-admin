<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Equip;
use App\Model\Fonte;
use App\Model\Doenca;
use App\Model\Trata;

class EquipController extends Controller {

    private $equip;
    private $fonte;
    private $doenca;
    private $trata;

    public function __construct(Equip $equip, Fonte $fonte, Doenca $doenca, Trata $trata) {
        $this->equip = $equip;
        $this->fonte = $fonte;
        $this->doenca = $doenca;
        $this->trata = $trata;
    }

    public function index() {
        $fontes = $this->fonte->all();
        $fontes2 = $this->fonte->all(['nm_fonte','enabled']);
        $doencas = $this->doenca->all();
        $doencas2 = $this->doenca->all(['cid','enabled']);
        $equips = $this->equip->all();
        $equips2 = $this->equip->all(['nm_equip','enabled']);
        $tratas = $this->trata->all();

        $fab = DB::select('SELECT DISTINCT nm_fabricante from equips');
        return view('Dash.index', ['aeE' => 'true', 'inE' => 'in'], compact('fontes', 'fontes2', 'doencas', 'doencas2', 'equips', 'equips2', 'tratas', 'fab'));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        $dataForm = $request->all();
        $return = $this->equip->create($dataForm);

        if ($return) {
            return redirect()->route('equip.index')->with('success-E', 'cadastrado');
        } else
            return redirect()->back();
    }

    public function show($id) {
        //
    }

    public function edit($id_equip) {
        $equip = $this->equip->find($id_equip);

        $fontes = $this->fonte->all();
        $fontes2 = $this->fonte->all(['nm_fonte','enabled']);
        $doencas = $this->doenca->all();
        $doencas2 = $this->doenca->all(['cid','enabled']);
        $equips = $this->equip->all();
        $equips2 = $this->equip->all(['nm_equip','enabled']);
        $tratas = $this->trata->all();

        $fab = DB::select('SELECT DISTINCT nm_fabricante from equips');
        return view('Dash.index', ['aeE' => 'true', 'inE' => 'in'], compact('equip', 'fontes', 'fontes2', 'doencas', 'doencas2', 'equips', 'equips2', 'tratas', 'fab'));
    }

    public function update(Request $request, $id_equip) {
        $dataForm = $request->all();
        $equip = $this->equip->find($id_equip);
        $update = $equip->update($dataForm);

        if ($update):
            return redirect()->route('equip.index')->with('success-E', 'alterado');
        else:
            return redirect()->back()->with(['errors' => 'Falha ao editar']);
        endif;
    }

    public function disable($id) {
        $equip = $this->equip->find($id);
        $equip->enabled = 0;

        $equip->save();

        return redirect()->route('equip.index');
    }

    public function apiEquip($fonte, $doenca) {
        return DB::select("SELECT e.id_equip,e.nm_equip FROM `tratas` t 
        JOIN equips e ON (t.nm_equip = e.nm_equip) 
        WHERE t.cid = '$doenca' AND t.nm_fonte = '$fonte'AND e.enabled = 1 GROUP BY e.id_equip, e.nm_equip");
    }

}
