# NEED TO UPDATE



## Rewrite SRS in GML Files

### One File
```
php path/to/script path/to/file.gml DimensionNumber EPSGReferential
```

### One Folder -> Recursive
```
php path/to/script -r path/to/folder DimensionNumber EPSGReferential
```

The GML base file will be modified with the new srsName node.

An output file will be created on the "rewrited" folder.


## Réécriture de SRS dans des fichiers GML

### 1 Fichier
```
php chemin/vers/script chemin/vers/fichier.gml NombreDimensions ReferentielEPSG
```

### 1 Dossier -> Récursif
```
php chemin/vers/script -r chemin/vers/fichier.gml NombreDimensions ReferentielEPSG
```

Un fichier GML de base sera transformé avec la bonne node srsName.

Un fichier de sortie sera créer dans le dossier "rewrited."
