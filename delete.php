<?php

// Delete clusters 
// This assumes we've fixed whatever clustering/mapping needs to be fixed, and that these
// are just spurious records.

require_once (dirname(__FILE__) . '/lib.php');
require_once (dirname(__FILE__) . '/config.inc.php');
require_once (dirname(__FILE__) . '/couchsimple.php');


$ids=array(
4498275,
4400364,
36786,
2531699,
2527970,
1084847,
1432126,
1020029,
1014430
);

foreach ($ids as $id)
{
	$cluster_id = 'cluster/' . $id;
	$couch->add_update_or_delete_document(null, $cluster_id, 'delete');
}



?>

