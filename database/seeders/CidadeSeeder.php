<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cidade;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cidade::insert([
            ['nome' => 'Maceió', 'uf' => 'AL'],
            ['nome' => 'Pilar', 'uf' => 'AL'],
            ['nome' => 'Rio Largo', 'uf' => 'AL'],
            ['nome' => 'Marechal Deodoro', 'uf' => 'AL'],
            ['nome' => 'Satuba', 'uf' => 'AL'],
            ['nome' => 'Santa Luzia do Norte', 'uf' => 'AL'],
            ['nome' => 'Coqueiro Seco', 'uf' => 'AL'],
            ['nome' => 'Messias', 'uf' => 'AL'],
            ['nome' => 'Paripueira', 'uf' => 'AL'],
            ['nome' => 'Barra de São Miguel', 'uf' => 'AL'],
            ['nome' => 'São Miguel dos Campos', 'uf' => 'AL'],
            ['nome' => 'Murici', 'uf' => 'AL'],
        ]);
    }
}
