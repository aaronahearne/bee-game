<?php

namespace App\Http\Models;


class QueenBee extends AbstractBee
{
    /**
     * QueenBee constructor.
     */
    public function __construct($id)
    {
        parent::__construct($id);
        $this->icon = 'queen.jpg';
        $this->hitPoints = 100;
        $this->damagePerHit = 8;
    }

    public function getType()
    {
        return 'queen';
    }
}