<?php

namespace App\Http\Resources;

class BusinessCardResource
{

    /**
     * Resource
     * @var array
     */
    public $resource;

    /**
     * BusinessCardResource constructor.
     *
     * @param $resource
     */
    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray($resource = null)
    {
        if ($resource !== null) $this->resource = $resource;

        $arr = array();

        foreach ($this->resource->children() as $r)
	    {
            if(count($this->resource->children()) == 0)
            {
                $arr[$this->resource->getName()] = strval($r);
            }
            else
            {
                $arr[$this->resource->getName()][] = $this->toArray($r);
            }
	    }

	    return $arr;
    }

}
