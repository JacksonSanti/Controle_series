<?php

namespace Tests\Feature;

use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Psy\TabCompletion\Matcher\FunctionDefaultParametersMatcher;
use Tests\TestCase;

class RemovedorDeSerieTest extends TestCase
{
    use RefreshDatabase;
    private $serie;

    protected Function setUp(): void
    {
        parent::setUp();
        $criadorDeserie = new CriadorDeSerie;
        $this->serie = $criadorDeserie->criarSerie('nome da serie',1,1);
    }
 
    public function testRemoverUmaSerie()
    {
        $this->assertDatabaseHas('series',['id' => $this->serie->id]);
        $removedorDeSerie = new RemovedorDeSerie();
        $nomeSerie = $removedorDeSerie->removerSerie($this->serie->id);
        $this->assertIsString($nomeSerie);
        $this->assertEquals('nome da serie', $this->serie->nome);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);



    }
}
