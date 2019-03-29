<?php

namespace App;

use App\Helper\Assigner;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public $weight;
    public $id;
    public $name;
    public $cfa_url;
    public $vetstreet_url;
    public $vcahospitals_url;
    public $temperament;
    public $origin;
    public $country_codes;
    public $country_code;
    public $description;
    public $life_span;
    public $indoor;
    public $alt_names;
    public $adaptability;
    public $affection_level;
    public $child_friendly;
    public $dog_friendly;
    public $energy_level;
    public $grooming;
    public $health_issues;
    public $intelligence;
    public $shedding_level;
    public $social_needs;
    public $stranger_friendly;
    public $vocalisation;
    public $experimental;
    public $hairless;
    public $natural;
    public $rare;
    public $rex;
    public $suppressed_tail;
    public $short_legs;
    public $wikipedia_url;
    public $hypoallergenic;

    /**
     * @param Object $attributes
     */
    public function populate($attributes)
    {
        if (isset($attributes)) {
                if (!empty($attributes->weight)) {
                    $this->weight = new Weight();
                    $this->weight->populate($attributes->weight);
                }
            $this->id = Assigner::assignIfPropertyExists($attributes, 'id');
            $this->name = Assigner::assignIfPropertyExists($attributes, 'name');
            $this->cfa_url = Assigner::assignIfPropertyExists($attributes, 'cfa_url');
            $this->vetstreet_url = Assigner::assignIfPropertyExists($attributes, 'vetstreet_url');
            $this->vcahospitals_url = Assigner::assignIfPropertyExists($attributes, 'vcahospitals_url');
            $this->temperament = Assigner::assignIfPropertyExists($attributes, 'temperament');
            $this->origin = Assigner::assignIfPropertyExists($attributes, 'origin');
            $this->country_codes = Assigner::assignIfPropertyExists($attributes, 'country_codes');
            $this->country_code = Assigner::assignIfPropertyExists($attributes, 'country_code');
            $this->description = Assigner::assignIfPropertyExists($attributes, 'description');
            $this->life_span = Assigner::assignIfPropertyExists($attributes, 'life_span');
            $this->indoor = Assigner::assignIfPropertyExists($attributes, 'indoor');
            $this->alt_names = Assigner::assignIfPropertyExists($attributes, 'alt_names');
            $this->adaptability = Assigner::assignIfPropertyExists($attributes, 'adaptability');
            $this->affection_level = Assigner::assignIfPropertyExists($attributes, 'affection_level');
            $this->child_friendly = Assigner::assignIfPropertyExists($attributes, 'child_friendly');
            $this->dog_friendly = Assigner::assignIfPropertyExists($attributes, 'dog_friendly');
            $this->energy_level = Assigner::assignIfPropertyExists($attributes, 'energy_level');
            $this->grooming = Assigner::assignIfPropertyExists($attributes, 'grooming');
            $this->health_issues = Assigner::assignIfPropertyExists($attributes, 'health_issues');
            $this->intelligence = Assigner::assignIfPropertyExists($attributes, 'intelligence');
            $this->shedding_level = Assigner::assignIfPropertyExists($attributes, 'shedding_level');
            $this->social_needs = Assigner::assignIfPropertyExists($attributes, 'social_needs');
            $this->stranger_friendly = Assigner::assignIfPropertyExists($attributes, 'stranger_friendly');
            $this->vocalisation = Assigner::assignIfPropertyExists($attributes, 'vocalisation');
            $this->experimental = Assigner::assignIfPropertyExists($attributes, 'experimental');
            $this->hairless = Assigner::assignIfPropertyExists($attributes, 'hairless');
            $this->natural = Assigner::assignIfPropertyExists($attributes, 'natural');
            $this->rare = Assigner::assignIfPropertyExists($attributes, 'rare');
            $this->rex = Assigner::assignIfPropertyExists($attributes, 'rex');
            $this->suppressed_tail = Assigner::assignIfPropertyExists($attributes, 'suppressed_tail');
            $this->short_legs = Assigner::assignIfPropertyExists($attributes, 'short_legs');
            $this->wikipedia_url = Assigner::assignIfPropertyExists($attributes, 'wikipedia_url');
            $this->hypoallergenic = Assigner::assignIfPropertyExists($attributes, 'hypoallergenic');
        }
    }

}
