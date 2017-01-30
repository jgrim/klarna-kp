<?php namespace KlarnaKp;

abstract class Model
{
    /**
     * @return array
     */
    public function toArray()
    {
        return [];
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return \GuzzleHttp\json_encode($this->toArray());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }
}
