<?php

namespace App\Http\Models;


class WorkerBee extends AbstractBee
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->icon = 'worker.jpg';
        $this->hitPoints = 75;
        $this->damagePerHit = 10;
    }

    public function getType()
    {
        return 'worker';
    }
}