## Rewrite SRS in GML Files

### One File
```
~ (CLI command must be done in the php script folder)
php path/to/script path/to/file.gml DimensionNumber EPSGref
php rewrite_srs.php /home/gemma/Téléchargements/Gare_NIMES/gml/test/test.gml 3 3943
```

### One Folder -> Recursive

```
~ (CLI command must be done in the php script folder)
php path/to/script -r path/to/folder DimensionNumber EPSGref
php rewrite_srs.php -r /home/gemma/Téléchargements/Gare_NIMES/gml/ 3 3943
```

Un fichier GML de base sera transformé avec la bonne node srsName.
Un nouveau fichier sera créer dans le dossier "rewrited"
