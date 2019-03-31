<?php

namespace App;

use App\Helper\Assigner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class CatImage
 * @package App
 */
class CatImage extends Model
{
    public $id;
    public $url;
    public $breed;
    public $labels;
    public $created_at;

    /**
     * CatImage constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->labels = new Collection();
    }

    /**
     * @param \stdClass $api_search_response
     *
     * @return Collection<CatImage>
     */
    public static function populateCollection($api_search_response)
    {
        $cat_collection = new Collection();
        foreach ($api_search_response as $cat_array) {
            $cat = self::populate($cat_array);
            $cat_collection->add($cat);
        }
        return $cat_collection;
    }

    /**
     * @param \stdClass $cat_attributes
     * @param array     $analysis_attributes
     *
     * @return CatImage
     */
    public static function populate($cat_attributes, $analysis_attributes = [])
    {
        $cat = new CatImage();
        if (isset($cat_attributes)) {
            $cat->id  = Assigner::assignIfPropertyExists($cat_attributes, 'id');
            $cat->url = Assigner::assignIfPropertyExists($cat_attributes, 'url');
        }
        if (property_exists($cat_attributes, 'breeds') && sizeof($cat_attributes->breeds) > 0) {
            $cat->breed = new Breed();
            $cat->breed->populate($cat_attributes->breeds[0]);
        }

        $cat->populate_analysis($analysis_attributes);
        return $cat;
    }

    /**
     * @param array $attributes
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
