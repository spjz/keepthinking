<?php
/**
## Question 2 - Search pattern

Please write a *function* that returns the index of the best match, when looking at an array of values.

```php
$needle = "London, England, uk";
$haystack = array(
    1 => array("London", "Ontario", "Canada"),
    8 => array("Greater London", "England", "UK"),
    4 => array("London", "England", "United Kingdom"),
    9 => array("London", "California", "United States")
);

echo best_match($needle, $haystack);

function best_match($needle, $haystack)
{
    // Your code here
}
```

What I am looking for is code that can analyse and compare each element of each array and rank them according to the the number of characters that are matched in each.

Expected output: 
```
8
```
Tip: be careful about case sensitivity and spaces.
*/

function lowercase_array(array $array): array {
    return array_map(function ($value) {
        if (is_array($value)) {
            return lowercase_array($value);
        } else {
            return strtolower($value);
        }
    }, $array);
}

function best_match(string $needle, array $haystack) : int
{
    // Lowercase both the needle and haystack elements for case-insensitive matching
    $needle = strtolower($needle);
    
    $haystack_lower = lowercase_array($haystack);
    $best_match_score = -1;
    $best_match_key = -1;
    
    // Calculate the number of matching characters between the needle and each sublist element
    foreach($haystack_lower as $key => $sublist) {
       
        $match_score = 0;
        foreach ($sublist as $item) {
            // Use substr_count for multiple occurrences
            $match_score += substr_count($needle, $item); 
        }
        
        if ($match_score > $best_match_score) {
            $best_match_score = $match_score;
            $best_match_key = $key;
        }
    }
    return $best_match_key;
}

$needle = "London, England, uk";
$haystack = array(
    1 => array("London", "Ontario", "Canada"),
    8 => array("Greater London", "England", "UK"),
    4 => array("London", "England", "United Kingdom"),
    9 => array("London", "California", "United States")
);

echo best_match($needle, $haystack);
