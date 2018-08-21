<?php

namespace App\Http\Controllers;

use App\Http\Factories\BeeFactory;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $workers = array_fill(0, 5, 'worker');
        $drones = array_fill(0, 8, 'drone');
        $queen = ['queen'];
        $beeTypes = array_merge($workers, $drones, $queen);


        foreach($beeTypes as $id => $beeType) {
            $bees[] = BeeFactory::build($id, $beeType);
        }

        return view('game')->with(['bees' => $bees]);
    }

    public function hit(Request $request)
    {
        $beeData = $request->all();
        $bees = BeeFactory::createSwarmFromArray($beeData);
        $this->hitRandomBee($bees);
        $swarmHealth = $this->getSwarmHealth($bees);

        if($swarmHealth < 1){
            return $this->resetGame();
        }

        return view('game')->with(['bees' => $bees]);
    }

    private function hitRandomBee($bees)
    {
        /* @var \App\Http\Models\AbstractBee */
        $randomBee = $bees[array_rand($bees)];

        if($randomBee->getHitPoints() < 1){
            $this->hitRandomBee($bees);
        }

        $randomBee->takeDamage();
    }

    private function getSwarmHealth($bees)
    {
        $remainingSwarmHp = 0;

        foreach ($bees as $bee) {
            if ($bee->getType() === 'queen' && $bee->getHitPoints() < 1) {
                return 0;
            }

            $remainingSwarmHp += $bee->getHitPoints();
        }

        return $remainingSwarmHp;
    }

    private function resetGame()
    {
        return redirect('/');
    }
}
