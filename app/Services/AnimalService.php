<?php

namespace App\Services;

use App\Models\Animal;

class AnimalService
{
    /**
     * Obtiene los animales junto con sus cuidadores.
     * author gk
     * @param int $limit El número máximo de resultados a devolver (por defecto es 1).
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function obtenerAnimalesConCuidadores(int $limit = 1)
    {
        return Animal::select('id', 'nombre')
            ->with('animalcuidadors.cuidador:id,nombre')
            ->limit($limit)
            ->get();
    }
}
