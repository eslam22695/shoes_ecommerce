<?php

namespace App\Repositories;

use App\Models\Sole;
use Illuminate\Container\Container as App;
//use Your Model

/**
 * Class SoleRepository.
 */
class SoleRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Sole::class;
    }
}
