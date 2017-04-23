# CommandOnHold
An easy-to-use in-dev plugin that when you hold an item, executes a command, either the player or console, or both, executes a command on the player who holds that certain item.

**Status:**
Ready for testing! In-development

[![Poggit-CI](https://poggit.pmmp.io/ci.badge/CaptainDuck/CommandOnHold/CommandOnHold)](https://poggit.pmmp.io/ci/CaptainDuck/CommandOnHold/CommandOnHold)

**Developer Questions:**
Is this how you do the $i++ thing??

__Code:__
```php
foreach($playercmds as $i){
    $consolecmds = $th["id"]["consolecmds"];
    $this->getServer()->dispatchCommand($player, $i);
    $i++;
}
```

__Config:__
```yaml
items:
  id: 276
   level/world: "world"
   playercmds:
     - "hub
```

__Thanks!__
