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
        $this->middleware('auth');
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
        return view('Dash.index', compact('fontes', 'fontes2', 'doencas', 'doencas2', 'equips', 'equips2', 'tratas', 'fab'));
    }

}
