<?php

/**
## Question 4 - Active Record

When in CodeIgnirer or Laravel, we use structured SQL queries. What are the expected SQL statements, which correspond to the methods below?

```php
// 1
$this->db->delete('_conf_node_type_xrefs', array('node_id' => 1));
```
```php
// 2
$cluster = array(
    'name' => 'Default',
    'reference' => 'default'
);
$this->db->update('_conf_cluster', $cluster, "id = 2");
```
```php
// 3
$query = $this->db->select("tx.id, tx.type_id, t.name, tx.source_node_ids, tx.grouping")
->from('_conf_type_xrefs tx')
->join('_conf_type t', 't.id = tx.source_type_id', 'left')
->where('tx.type_id', $type_id)
->order_by('cast(tx.grouping as unsigned), tx.rank');
```
```php
// 4
$type = array(
    'name' => 'Test'
    'table' => 'test'
);
$this->db->insert('_conf_type', $type);
```
*/

/** 1
DELETE FROM _conf_node_type_xrefs
WHERE node_id = 1;
*/

/** 2
UPDATE _conf_cluster
SET name = 'Default', reference = 'default'
WHERE id = 2;
*/

/** 3
SELECT tx.id, tx.type_id, t.name, tx.source_node_ids, tx.grouping
FROM _conf_type_xrefs AS tx
LEFT JOIN _conf_type AS t
ON t.id = tx.source_type_id
WHERE tx.type_id = ? -- $type_id
ORDER BY CAST(tx.grouping AS UNSIGNED), tx.rank;
*/

/** 4
INSERT INTO _conf_type (name, table)
VALUES ('Test', 'test');
*/