<?php

namespace App;

use App\Helper\Assigner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CatImage extends Model
{
    public $id;
    public $url;
    public $breed;
    public $labels;
    public $created_at;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->labels = new Collection();
    }

    /**
     * @param Object $attributes
     */
    public function populate($attributes)
    {
        if (isset($attributes)) {
            $this->id = Assigner::assignIfPropertyExists($attributes, 'id');
            $this->url = Assigner::assignIfPropertyExists($attributes, 'url');
        }
        if (property_exists($attributes, 'breeds') && sizeof($attributes->breeds) > 0) {
            $this->breed = new Breed();
            $this->breed->populate($attributes->breeds[0]);
        }
    }

    /**
     * @param $attributes
     */
    public function populate_analysis($attributes)
    {
        if (!empty($attributes)) {
            if (!empty(($attributes[0]))) {
                if (property_exists($attributes[0], 'labels')) {
                    $this->labels = new Collection();
                    foreach ($attributes[0]->labels as $label) {
                        if (property_exists($label, 'Name')) {
                            $this->labels->add($label->Name);
                        }
                    }
                }
            }
            $this->created_at = Assigner::assignIfPropertyExists($attributes[0], 'created_at');
        }
    }
}
