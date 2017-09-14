# bionames-similar-names
Clustering taxonomic names that are similar

## Notes on clustering species names

Need to have a function that recognises that different names are "the same" (e.g., sharing species names that differ in gender, typos, etc.)

Can then do some queries such as 

```
SELECT n1.specificStem, n1.nameComplete, n2.nameComplete, n1.taxonAuthor, n2.taxonAuthor FROM names AS n1 
INNER JOIN names as n2 USING(specificStem)
WHERE n1.specificStem=“bartelsi” AND n1.genusPart = n2.genusPart AND (n1.specificEpithet <> n2.specificEpithet) AND (n1.infraSpecificEpithet IS NULL) AND (n2.infraSpecificEpithet IS NULL);
```


Need to delete old cluster from CouchDB

Need to update CouchDB view code to index the individual names in the cluster, not just the one name (previously all clusters had only one name).

