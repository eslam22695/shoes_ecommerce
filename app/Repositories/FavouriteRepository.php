<?php

namespace App\Repositories;

use App\Models\Favourite;
use Illuminate\Container\Container as App;
//use Your Model

/**
 * Class FavouriteRepository.
 */
class FavouriteRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Favourite::class;
    }
}
