<?php

namespace App\Resources\BusinessCards;

use Illuminate\Support\Str;
use Prewk\XmlStringStreamer;

class BusinessCard
{
    /**
     * XmlStringStreamer
     * @var null
     */
    private $streamer = null;

    /**
     * Unique Node
     * @var string
     */
    private $uniqueNode = 'businesscard';

    /**
     * XML Short Closing
     * @var
     */
    private $shortClosing = true;

    /**
     * Business Cards Data
     * @var string
     */
    private $businessCardsFile = 'businesscards/business-cards.xml';

    /**
     * BusinessCard constructor.
     */
    public function __construct()
    {
        $this->streamer = XmlStringStreamer::createUniqueNodeParser(
            database_path($this->businessCardsFile),
            [
                'uniqueNode' => $this->uniqueNode,
                'checkShortClosing' => $this->shortClosing
            ]
        );
    }

    /**
     * @param $icd
     * @param $enterprise
     * @return null|\SimpleXMLElement
     */
    public function getById($icd, $enterprise)
    {
        $result = false;

        while ($node = $this->streamer->getNode()) {

            $simpleXmlNode = simplexml_load_string($node);

            $value = explode(':', (string) $simpleXmlNode->participant->attributes()->value);

            if($icd == (string) $value[0] && $enterprise == (string) $value[1]) {
                $result = $simpleXmlNode;
                break;
            }
        }

        return $result;
    }

    /**
     * @param $name
     * @return array|bool
     */
    public function searchByName($name)
    {
        $upperCaseName = strtoupper($name);

        $result = false;

        while ($node = $this->streamer->getNode()) {

            $simpleXmlNode = simplexml_load_string($node);

            $value = (string) $simpleXmlNode->entity->name->attributes()->name;

            if (Str::contains(strtoupper($value), $upperCaseName)) {
                $result[] = $simpleXmlNode;
            }
        }

        return $result;
    }


    /**
     * @param $name
     * @return array|bool
     */
    public function getByName($name)
    {
        $upperCaseName = strtoupper($name);

        $result = false;

        while ($node = $this->streamer->getNode()) {

            $simpleXmlNode = simplexml_load_string($node);

            $value = (string) $simpleXmlNode->entity->name->attributes()->name;

            if (strtoupper($value) === $upperCaseName) {
                $result = $simpleXmlNode;
            }
        }

        return $result;
    }
}