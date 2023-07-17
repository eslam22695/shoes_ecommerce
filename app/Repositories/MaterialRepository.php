<?php

namespace App\Repositories;

use App\Models\Material;
use Illuminate\Container\Container as App;
//use Your Model

/**
 * Class MaterialRepository.
 */
class MaterialRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Material::class;
    }
}
