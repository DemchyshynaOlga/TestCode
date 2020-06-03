<?php

/**
 * Class Helper
 */
class Helper
{
    /**
     * @param $format
     * @param $data
     * @return mixed
     */
    public static function prepareRequestData($format, $data)
    {
        if ($format == 'xml') {
            $data = json_encode(simplexml_load_string($data));
        }

        return json_decode($data);
    }

    /**
     * @param $format
     * @param $data
     * @return mixed|null|string
     */
    public static function prepareResponsData($format, $data)
    {
        if ($format == 'json') {
            return json_encode($data, JSON_FORCE_OBJECT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }

        if ($format == 'xml') {
            $xml = new SimpleXMLElement('<rootTag/>');
            Xml::arrayToXml($data, $xml);
            $result = $xml->asXML();
        }

        return $result ? $result : null;
    }

    /**
     * @return string
     */
    public static function generateHash()
    {
        return hash('sha256', Config::getField('key') . date('d/m/Y') . time());
    }
}