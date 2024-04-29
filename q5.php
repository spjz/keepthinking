<?php

/**
## Question 5 - Basic SQL

Please consider the following:

```php
$place = "Jimmy's Place";
$sql = "INSERT INTO place(name) VALUES('{$place}')";
$this->db->query($sql);
```
Is this going to be valid, or will it produce an error? And if there is an error, what is it and how can it be fixed?
*/

/**
This code introduces an SQL injection vulnerability, whereby a user could cause the server to execute malicious queriesz
by defining the string $place to contain a closing query segment '); followed by an arbitrary query.

It can be prevented by using either prepared statements, or escaped strings which replace special characters like quotes with safe representations..
*/

// Prepared statement example
$place = "Jimmy's Place";
$sql = "INSERT INTO place(name) VALUES (?)";
$stmt = $this->db->prepare($sql);
$stmt->bind_param("s", $place);
$stmt->execute();

// Escaped strings example
$place = "Jimmy's Place";
$escaped_place = $this->db->escape_string($place);
$sql = "INSERT INTO place(name) VALUES('{$escaped_place}')";
$this->db->query($sql);