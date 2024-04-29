<?php

/**
## Question 1 - OO FizzBuzz 

This is a classic test, but I would like you to think about it in a different, object-oriented way.

Write a program that prints the numbers from 1 to 100:
- For multiples of 3 print "Fizz" instead of the number
- For multiples of 5 print "Buzz". 
- For numbers which are multiples of both 3 and 5 print "FizzBuzz".

I would like you to write a Class for this task.

```php
<?php
// Variables

class FizzBuzz
{
    // Your code here
}
```
The expected result is:
```
1
2
Fizz
4
Buzz
Fizz
7
8
Fizz
Buzz
11
Fizz
13
14
FizzBuzz
16
... etc.
```
*/

class FizzBuzz
{
    
    private int $start;
    private int $end;
    
    public function __construct(int $start, int $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
    
    private function check(int $number) : string
    {
        if($number % 15 === 0) {
            return 'FizzBuzz';
        }
        
        if($number % 3 === 0) {
            return 'Fizz';
        }
        
        if($number % 5 === 0) {
            return 'Buzz';
        }
        
        return (string) $number;
    }
    
    public function run() : void
    {
        for ($i = $this->start; $i <= $this->end; $i++) {
            echo $this->check($i) . PHP_EOL;
        }
    }
}

$fizzBuzz = (new FizzBuzz(1, 100))->run();

