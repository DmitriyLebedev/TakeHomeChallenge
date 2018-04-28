<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

foreach (['Person', 'Donor', 'Owner', 'Event', 'Org', 'OutputFunctions'] as $inc)
     require ($inc .'.php');

$foo = new Donor();
$foo->setName('Foo Doe');
$foo->setBirthDate('1990-02-02');
$foo->setGender('m');
$foo->setInterest("Music");
$foo->setInterest("Movies");

$baz = new Owner();
$baz->setName('Baz Doe');
$baz->setBirthDate('1990-02-02');
$baz->setGender('m');

$event1 = new Event("Cool Night Out", "2016-03-11 17:00:00", "30m");
$event2 = new Event("Lunch With Baz", "2016-04-22 12:30:00", "2h");

$bar = new Org();
$bar->setName('Baz Org');
$bar->setAddress('123 E Main St');
$bar->setOrgOwner($baz);
$bar->setOrgId('9494949OR');
$bar->addEvent($event1);
$bar->addEvent($event2);

$foo->attendEvent($event1);

$foo->printJson();
$baz->printJson();
$bar->printJson();
$bar->getNextEvent()->printJson();
