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
        $fontes = $this->fonte->all();
        $fontes2 = DB::select('select distinct nm_fonte from fontes');
        $doencas = $this->doenca->all();
        $doencas2 = DB::select('select distinct cid from doencas');
        $equips = $this->equip->all();
        $equips2 = DB::select('select distinct nm_equip from equips');
        $tratas = $this->trata->all();
        
        $fab = DB::select('SELECT DISTINCT nm_fabricante from equips');
        return view('Dash.index', compact('fontes', 'fontes2', 'doencas', 'doencas2', 'equips', 'equips2', 'tratas', 'fab'));
    }

}
