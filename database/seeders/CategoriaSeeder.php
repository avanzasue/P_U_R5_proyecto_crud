<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $filename = __DIR__ . "/scripts/categorias.sql";
        $file = fopen($filename, "r");
        if ($file == false) {
            echo "Error al abrir scripts categorias...";
        }
        $filesize = filesize($filename);
        $filetext = fread($file, $filesize);
        fclose($file);
        DB::unprepared($filetext);
    }
}

