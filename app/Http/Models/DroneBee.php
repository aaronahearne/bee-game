<?php

namespace App\Http\Models;


class DroneBee extends AbstractBee
{

    /**
     * DroneBee constructor.
     */
    public function __construct($id)
    {
        parent::__construct($id);
        $this->icon = 'drone.jpg';
        $this->hitPoints = 50;
        $this->damagePerHit = 12;
    }

    public function getType()
    {
        return 'drone';
    }
}