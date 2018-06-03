<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Configuracoes extends Model
{
 
    protected $diametroSaidaLaser;
    protected $comprimentoOnda;
    protected $modoOperacao;
    protected $potenciaRadiante;
    protected $polarizacao;
    protected $areaSaidaLaser;
    protected $perfilFeixe;
    protected $tamanhoFeixeAlvo;
    protected $irradianciaAlvo;
    protected $tempoExposicaoPorPonto;
    protected $exposicaoRadiante;
    protected $energiaRadiante;
    protected $numeroPontosIrradiados;
    protected $numeroTratamentos;
    protected $frequenciaTratamentos;
    protected $energiaRadianteTotal;
  
    public function geraConfigs($configs) {
        
      
           $configsArmazenadas = DB::table('tratas')
             ->join('doencas','doencas.cid','=','tratas.cid')
             ->join('equips','equips.nm_equip','=','tratas.nm_equip')
             ->select('tratas.tempo','tratas.sessoes','tratas.freq','doencas.cid','equips.comprimento_onda'
                      ,'equips.modo_operacao','equips.area','equips.potencia_max'
                      ,'equips.polarizacao','equips.perfil')
             ->where("nm_fonte",'=',$configs->input('light.nm_fonte'))
             ->where('equips.nm_equip','=',$configs->input('equipment.nm_equip'))
             ->where('doencas.nome_doenca','=',$configs->input('disease.nome_doenca'))
             ->first();
      
             $this->diametroSaidaLaser = $configsArmazenadas->area;
             $this->comprimentoOnda = $configsArmazenadas->comprimento_onda;
             $this->modoOperacao = $configsArmazenadas->modo_operacao;
             $this->potenciaRadiante = $configsArmazenadas->potencia_max;
             $this->polarizacao = $configsArmazenadas->polarizacao;
             $this->areaSaidaLaser = 3.14*pow(($this->diametroSaidaLaser/2),2);
             $this->perfilFeixe = $configsArmazenadas->perfil;
             $this->tamanhoFeixeAlvo = $configs->beamSize;
             $this->irradianciaAlvo = number_format(($this->potenciaRadiante / $this->areaSaidaLaser),3);
             $this->exposicaoRadiante = 4;
             $this->tempoExposicaoPorPonto = ($this->exposicaoRadiante*$this->areaSaidaLaser) / $this->potenciaRadiante; 
             $this->energiaRadiante = ($this->potenciaRadiante * $this->tempoExposicaoPorPonto);
             $this->numeroPontosIrradiados = $configs->irradiatedSpots;
             $this->numeroTratamentos = $configsArmazenadas->sessoes;
             $this->frequenciaTratamentos = $configsArmazenadas->freq;
             $this->energiaRadianteTotal = ($this->energiaRadiante * $this->numeroPontosIrradiados);

          return [
              ["title" => "Comprimento de onda central (nm)" , "value" => $this->comprimentoOnda],
              ["title" => "Modo de Operação" , "value" => $this->modoOperacao],
              ["title" => "Potência radiante média (mW)" , "value" => $this->potenciaRadiante],
              ["title" => "Polarização " , "value" => $this->polarizacao],
              ["title" => "Área na saída do laser (cm²)" , "value" => $this->areaSaidaLaser],
              ["title" => "Perfil do feixe" , "value" => $this->perfilFeixe],
              ["title" => "Tamanho do feixe no alvo (cm²)" , "value" => $this->tamanhoFeixeAlvo],
              ["title" => "Irradiancia no alvo (mW/cm²)" , "value" => $this->irradianciaAlvo],
              ["title" => "Tempo de exposição por ponto (s)" , "value" => $this->tempoExposicaoPorPonto],
              ["title" => "Exposição radiante (J/cm²)" , "value" => $this->exposicaoRadiante],
              ["title" => "Energia radiante (J)" , "value" => $this->energiaRadiante],
              ["title" => "Número de pontos irradiados" , "value" => $this->numeroPontosIrradiados],
              ["title" => "Número de tratamentos" , "value" => $this->numeroTratamentos],
              ["title" => "Frequencia dos tratamentos" , "value" => $this->frequenciaTratamentos],
              ["title" => "Energia radiante total (J)" , "value" => $this->energiaRadianteTotal],
          ];
    }
}
