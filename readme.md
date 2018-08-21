## Bee Game

To deploy, run `php artisan serve`

Visit `http://127.0.0.1:8000/`

### Gameplay

- Drone Bees have 50 HP and take 12 damage per hit
- Worker Bees have 75 HP and take 10 damage per hit
- Queen Bee has 100 HP and takes 8 damage per hit

### How to play
- Hit the Hit! button until all bees HP are 0
- If the Queen Bee's HP hits 0, you win!
- The game will reset upon a win!

### What could be improved
- Child bee's could do with an interface, to ensure they have the correct methods
- The 'unknown bee type' exception is not handled in the BeeFactory
- There are no unit tests!!! Doh!
- The UI is horrific
- There is no type hinting and no return type hinting
- A specific bee could be hit by changing the icons to a button and returning its ID
- Due to being solely written in PHP, the page flashes upon hit
- It is difficult to tell which bee has been hit without further work
- The bee type could be handled by reflecting the class name
- Due to being in PHP, the hit button must be handled as a form submission. This would work much more efficiently with 
Javascript handing back objects. The current implementation is fragile as it requires a naming convention to be met by
the front end
- The initial load should be handled by the BeeFactory to create the swarm, but was left as a loop due to time 
constraints

### Suggested unit tests
- With a model factory, the BeeFactory should at least be tested to ensure it returns correct Bee objects
- The AbstractBee class should be mocked and tested for takeDamage()
- createSwarmFromArray in the BeeFactory should also be tested to ensure it handles malformed arrays. Currently it will
fail poorly if the correct formatting is not met