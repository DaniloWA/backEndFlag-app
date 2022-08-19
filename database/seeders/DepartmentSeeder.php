<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    const DEPARTAMENT_NAMES = [
        "Ciências Humanas",
        "Matemática",
        "Biológicas",
        "Estágio"
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (SELF::DEPARTAMENT_NAMES as $name) {
            $this->createDepartament($name);
        }
    }

    public function createDepartament(string $name)
    {
        Departament::factory()->create([
            'uuid' => Str::uuid(),
            'name' => $name,
            'slug' => Str::slug($name)
        ]);
    }
}
