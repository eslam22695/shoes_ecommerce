<?php

namespace App\Repositories;

use App\Models\ShoeModel;
use Illuminate\Container\Container as App;
//use Your Model

/**
 * Class ShoeModelRepository.
 */
class ShoeModelRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return ShoeModel::class;
    }
}
