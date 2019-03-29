<?php

namespace App;

use App\Helper\Assigner;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    public $imperial;
    public $metric;

    /**
     * @param Object $attributes
     */
    public function populate($attributes)
    {
        if (isset($attributes)) {
            $this->imperial = Assigner::assignIfPropertyExists($attributes, 'imperial');
            $this->metric = Assigner::assignIfPropertyExists($attributes, 'metric');
        }
    }
}
