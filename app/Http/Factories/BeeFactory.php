<?php

namespace App\Http\Factories;


use App\Http\Models\DroneBee;
use App\Http\Models\QueenBee;
use App\Http\Models\WorkerBee;

class BeeFactory
{
    public static function build($id, $type, $hitPoints = null)
    {
        switch($type){
            case 'worker':
                $bee = new WorkerBee($id);
                break;
            case 'drone':
                $bee = new DroneBee($id);
                break;
            case 'queen':
                $bee = new QueenBee($id);
                break;
            default:
                throw new \Exception('Unknown bee type: ' . $type);
        }

        if($hitPoints !== null){
            $bee->setHitPoints($hitPoints);
        }

        return $bee;
    }

    public static function createSwarmFromArray($swarmData)
    {
        $parsedSwarmData = self::parseSwarmData($swarmData);
        $swarmModels = [];

        foreach ($parsedSwarmData as $beeData) {
            $swarmModels[] = self::build(
                $beeData['id'],
                $beeData['type'],
                $beeData['hitPoints']
            );
        }

        return $swarmModels;
    }

    private static function parseSwarmData($swarmData)
    {
        $parsedSwarmData = [];

        foreach ($swarmData as $identifiers => $hitPoints) {
            $identifiers = explode('_', $identifiers);
            $parsedSwarmData[] = [
                'id' => $identifiers[1],
                'type' => $identifiers[0],
                'hitPoints' => $hitPoints
            ];
        }

        return $parsedSwarmData;
    }
}