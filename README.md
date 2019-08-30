# SRSRewriter

### Description
A simple PHP tool in order to add the property 'srsName' to cityGML
files node. Since the v2 he is able to check all node who contain
'srsDimension' and display them.
### Version
v2 - 30/08/19


## Usage

### -f, --file
Look into the cityGML files passed as arguement.
### -d, --directory
Look for cityGML files into the directory passed as arguement.

/!\ It doesn't watch in subdirectories /!\
### -s, --srs = arg
Add the srsName on each node with srsDimension="3"
### -c, --check
/!\ Only with single file /!\

Check all gml node who contain srsDimension="3".

## Example
```
php main.php -f -s=3946 /home/CityGMLFolder/citygml.gml
php main.php -file -s=3946 /home/CityGMLFolder/citygml.gml

php main.php -d -s=3946 /home/CityGMLFolder/
php main.php -directory -s=3946 /home/CityGMLFolder/

php main.php -c /home/CityGMLFolder/citygml.gml
```

## Maintainer
Flayac Quentin - quentin.flayac@epitech.eu
