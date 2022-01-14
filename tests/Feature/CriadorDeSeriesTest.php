<?php

namespace Tests\Feature;

use App\Models\Serie;
use App\Services\CriadorDeSerie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CriadorDeSeriesTest extends TestCase
{

    use RefreshDatabase;
    



    public function testCriarSerie ()
    {
        $criadorDeSerie = new CriadorDeSerie();
        $nomeSerie = 'Nome de teste';
        $seriecriada = $criadorDeSerie->criarSerie($nomeSerie, 1 , 1 );

        $this->assertInstanceOf(Serie::class,$seriecriada);
        $this->assertDatabaseHas('series',['nome'=> $nomeSerie]);
        $this->assertDatabaseHas('temporadas', ['serie_id'=> $seriecriada->id,'numero'=>1]);
        $this->assertDatabaseHas('episodios',['numero' => 1]);





    
    }



}
