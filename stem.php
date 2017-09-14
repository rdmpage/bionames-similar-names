<?php

$filename = 'names.txt';

$file_handle = fopen($filename, "r");


function stem_species_name($species) {
    $stemmed_species = $species;

    /* 
    doi:10.1186/1471-2105-14-16

    The stemming (equivalent) in Taxamatch equates 
    -a, -is -us, -ys, -es, -um, -as and -os when 
    they occur at the end of a species epithet 
    (or infraspecies) by changing them all to -a. 
    Thus (for example) the epithets “nitidus”, “nitidum”, 
    “nitidus” and “nitida” will all be considered 
    equivalent following this process.  

    To this I've added -se and -sis, -ue and -uis
    */
    $matched = '';

    // -se
    if ($matched == '') {
        if (preg_match('/se$/', $species)) {
            $matched = 'se';
        }
    }

    // -sis
    if ($matched == '') {
        if (preg_match('/sis$/', $species)) {
            $matched = 'sis';
        }
    }

    // -sus
    if ($matched == '') {
        if (preg_match('/sus$/', $species)) {
            $matched = 'sus';
        }
    }
    
    // -ue
    if ($matched == '') {
        if (preg_match('/ue$/', $species)) {
            $matched = 'ue';
        }
    }
    
    // -uis
    if ($matched == '') {
        if (preg_match('/uis$/', $species)) {
            $matched = 'uis';
        }
    }

    // -is
    if ($matched == '') {
        if (preg_match('/is$/', $species)) {
            $matched = 'is';
        }
    }
    
    // -us
    if ($matched == '') {
        if (preg_match('/us$/', $species)) {
            $matched = 'us';
        }
    }
    
    
    // -ys
    if ($matched == '') {
        if (preg_match('/ys$/', $species)) {
            $matched = 'ys';
        }
    }
    
    // -es
    if ($matched == '') {
        if (preg_match('/es$/', $species)) {
            $matched = 'es';
        }
    }
    
    // -um
    if ($matched == '') {
        if (preg_match('/um$/', $species)) {
            $matched = 'um';
        }
    }

    // -as
    if ($matched == '') {
        if (preg_match('/as$/', $species)) {
            $matched = 'as';
        }
    }

    // -os
    if ($matched == '') {
        if (preg_match('/os$/', $species)) {
            $matched = 'os';
        }
    }


    // stem
    if ($matched != '') {
        $stemmed_species = preg_replace('/' . $matched . '$/', 'a', $species);
    } else {
        /* Tony's algorithm doesn't handle ii and i */
        // -ii -i 
        if (preg_match('/ii$/', $species)) {
            $stemmed_species = preg_replace('/ii$/', 'i', $species);
        }
    }

    return $stemmed_species;
}
		

while (!feof($file_handle)) 
{
	$name = trim (fgets($file_handle));
	
	// do a subset of names 
	if (preg_match('/^z/', $name))
	{
		// stem this name
		$stemmed_species = stem_species_name($name);
	
		echo 'UPDATE `names` SET specificStem="' . $stemmed_species . '" WHERE specificEpithet="' . $name . '";' . "\n";
	}
	
}

?>
