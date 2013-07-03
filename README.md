WP-MetaUpdater
==============

Simple class to aid in batch editing Wordpress meta data in the DB


Example Usage:
-------------


$metaUpdater = new WPMetaUpdater();


$id = 1;

while($id <= 20)
{
	$metaUpdater->createStatement($id , 'url' , 'http;//www.example.com');
	$id++;
}


