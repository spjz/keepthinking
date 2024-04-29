<?php

/**
## Question 3 - Hierarchies

I would like you to implement a solution that prints out hierarchies, based on the data below (these could be navigation trees).

You have the following array:

```php
$locations = array(
    3 => array("Building1", 2),
    2 => array("Area1", 1),
    0 => array("Floor1", 3),
    1 => array("City1"),
    4 => array("Room1", 0),

    13 => array("Building2", 12),
    12 => array("Area2", 11),
    14 => array("Room2", 10),
    10 => array("Floor2", 13),
    11 => array("City2")
);
```
The structure of the array is as follows:
```
key => array(term, parent_id)
```
In each element of the array, the second value points to the parent of the element itself. So for instance in the first array, ```City1``` is the root element and ```Area1``` is the first child, because the second element of ```Area1``` is ```1```, which is the ```key``` of  ```City1```.

The expected output is:
```
City1 > Area1 > Building1 > Floor1 > Room1
City2 > Area2 > Building2 > Floor2 > Room2
```
**Tip**. Think abstract and think about recursion.
**Plus points**. Write this as an Object Oriented Class
*/

class LocationHierarchy {
    private array $locations;
    
    public function __construct(array $locations)
    {
        $this->locations = $locations;
    }
    
    private function printHierarchy(int $id, string $prefix = "") : string
    {
        // Search for $key in $location[1] of list
        foreach ($this->locations as $key => $location) {
            if (!isset($location[1])) {
                continue;
            }
            if ($location[1] !== $id) {
                continue;
            }
            
            $prefix .= " > " . $location[0] . $this->printHierarchy($key);
        }
        
        return $prefix;
    }
    
    public function printAllHierarchies()
    {
        foreach ($this->locations as $id => $location) {
            
            if (!isset($location[1])) {
                
                echo $this->printHierarchy($id, $location[0]);
                echo PHP_EOL;
            }
        }
        
    }
}

$locations = array(
    3 => array("Building1", 2),
    2 => array("Area1", 1),
    0 => array("Floor1", 3),
    1 => array("City1"),
    4 => array("Room1", 0),

    13 => array("Building2", 12),
    12 => array("Area2", 11),
    14 => array("Room2", 10),
    10 => array("Floor2", 13),
    11 => array("City2")
);

$hierarchy = (new LocationHierarchy($locations))->printAllHierarchies();