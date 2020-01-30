<?php

namespace App\Http\Resources;

class BusinessCardCollection
{
    /**
     * Collection
     * @var array
     */
    public $collection = [];

    /**
     * BusinessCardCollection constructor.
     *
     * @param $collection
     */
    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    /**
     * Transform the resource xml into an array.
     *
     * @return array
     */
    public function toArray()
    {
        $result = [];

        foreach ($this->collection as $resource) {
            $result[] = [
                'name' => (string) $resource->entity->name->attributes()->name,
                'enterprise' => explode(':', (string) $resource->participant->attributes()->value)[1],
                'countryCode' => (string) $resource->entity->attributes()->countrycode
            ];
        }

        return $result;
    }
}
