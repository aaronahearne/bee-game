<?php

namespace App\Http\Models;


abstract class AbstractBee
{
    protected $hitPoints;
    protected $icon;
    protected $id;
    protected $damagePerHit;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setHitPoints($hitPoints)
    {
        $this->hitPoints = $hitPoints;
    }

    public function getHitPoints()
    {
        return $this->hitPoints;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function takeDamage()
    {
        $remainingHp = $this->hitPoints - $this->damagePerHit;
        $remainingHp = max(0, $remainingHp);
        $this->setHitPoints($remainingHp);
    }
}