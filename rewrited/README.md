## citygml-to-3dtiles tool
```
node --max-old-space-size=10000 --experimental-modules ./bin/citygml-to-3dtiles.mjs path/to/folder(or file) outputFolder

node --max-old-space-size=10000 --experimental-modules ./bin/citygml-to-3dtiles.mjs /home/gemma/Upfactor/uf-3d/app/lib/rewrited/  output
```
Cet utilitaire va créer un fichier full.b3dm & un fichier tileset.json (requis pour Cesium3DTileset).
