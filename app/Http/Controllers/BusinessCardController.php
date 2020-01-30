<?php

namespace App\Http\Controllers;

use App\Http\Resources\BusinessCardCollection;
use App\Http\Resources\BusinessCardResource;
use App\Resources\BusinessCards\BusinessCard;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessCardController
{
    /**
     * @var \App\Resources\BusinessCards\BusinessCard
     */
    public $businessCard = null;

    /**
     * BusinessCardController constructor.
     *
     * @param \App\Resources\BusinessCards\BusinessCard $businessCard
     */
    public function __construct(BusinessCard $businessCard)
    {
        $this->businessCard = $businessCard;
    }

    /**
     * @param $icd
     * @param $enterprise
     * @return \Illuminate\Http\JsonResponse
     */
    public function getById($icd, $enterprise)
    {
        $result = $this->businessCard->getById($icd, $enterprise);

        if ($result !== false) {
            return response()->json([
                'code' => 200,
                'data' => $result
            ]);
        }

        return response()->json([
            'code' => 404,
            'data' => null
        ]);
    }

    /**
     * @param $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchByName($name)
    {
        $result = $this->businessCard->searchByName($name);

        if ($result !== false) {
            return response()->json([
                'code' => 200,
                'data' => (new BusinessCardCollection($result))->toArray()
            ]);
        }

        return response()->json([
            'code' => 404,
            'data' => null
        ]);
    }

    /**
     * @param $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByName($name)
    {
        $result = $this->businessCard->getByName($name);

        if ($result !== false) {
            return response()->json([
                'code' => 200,
                'data' => $result
            ]);
        }

        return response()->json([
            'code' => 404,
            'data' => null
        ]);
    }
}