<?php namespace KlarnaKp\Contracts;

interface Model
{
    /**
     * @return array
     */
    public function toArray();

    /**
     * @return string
     */
    public function toJson();


    /**
     * @return string
     */
    public function __toString();
}
