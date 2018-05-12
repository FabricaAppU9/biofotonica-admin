<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Fonte;
use App\Model\Doenca;
use App\Model\Trata;
use App\Model\Equip;
use Illuminate\Support\Facades\DB;

class DashController extends Controller {

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
        $fontes = $this->fonte->getAll();
        $fontes2 = $this->fonte->getAll(['nm_fonte']);
        $doencas = $this->doenca->getAll();
        $doencas2 = $this->doenca->getAll(['nome_doenca']);
        $equips = $this->equip->getAll();
        $equips2 = $this->equip->getAll(['nm_equip']);
        $tratas = $this->trata->all();
        
        $fab = DB::select('SELECT DISTINCT nm_fabricante from equips');
        return view('Dash.index', compact('fontes', 'fontes2', 'doencas', 'doencas2', 'equips', 'equips2', 'tratas', 'fab'));
    }

}
