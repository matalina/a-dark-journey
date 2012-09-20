<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

/*$user = new User();

$user->username = 'Matalina';
$user->password = Hash::make('ka12si03');
$user->first_name = 'Alicia';
$user->last_name = 'Wilkerson';
$user->email = 'matalina@gmail.com';

$user->save();*/

Bundle::start('sparkdown');
Route::controller(Controller::detect());

Route::get('setup',function() {
  $files = array(
    'A Bit of History',
    'A Half of the Whole',
    'A New Hope',
    'A Stick of Binding',
    'Alec',
    'Alex',
    'Allison',
    'Alone Again',
    'Animal Ken',
    'Ant',
    'Tony',
    'Aurora',
    'Auspex',
    'Awakening',
    'Thea',
    'Babes in Waiting',
    'Back To Dangdburgh',
    'Before Dawn Academy',
    'Betrayal',
    'Bloodline',
    'Brandon',
    'Breaking Up is Hard to Do',
    'Breeana',
    'Breed',
    'Bryant',
    'Cari',
    'Cari\'s Estate',
    'Cari\'s Villa',
    'Characters',
    'Charles',
    'Chevalier',
    'China',
    'Christopher',
    'Damian',
    'Dangdburgh',
    'David',
    'Deputy Eldest',
    'Dimitri',
    'Domination',
    'Edmund',
    'Empath',
    'Empathy',
    'Enforcer',
    'Fearmonger',
    'Five Years Later',
    'Fortifications',
    'Francesco',
    'Frozen',
    'Henry',
    'Herd',
    'Hidden Cache',
    'Human',
    'Il Cane LLC',
    'Il Mandria di Cane',
    'Incubus',
    'Sucubus',
    'Jesse',
    'Into the Trenches',
    'Invasion of Privacy',
    'It\'s Not Love It\'s Business',
    'Ivan',
    'Jack',
    'Jaguar',
    'Johnny',
    'Alistair',
    'Joining the Family',
    'Josh',
    'Keeper of Secrets',
    'Kendall',
    'Larry',
    'Legends',
    'Lesser Chevalier',
    'Lesser Primeval',
    'Locations',
    'Lost and Found Again',
    'Making Plans',
    'Marie',
    'Mia',
    'Moving On',
    'Mystic',
    'Meelah',
    'Donatello',
    'New Alliances',
    'New Chevalier',
    'New Haven',
    'Nicola',
    'Not Part of the Plan',
    'Not Regulation',
    'Oblivion',
    'Plasma Fund',
    'Prime Minster',
    'Primeval Vampire',
    'Prisoners of War',
    'Puer Decem',
    'Puer Decem Filii',
    'Recap',
    'Redemption',
    'Rescue Mission',
    'Reunions',
    'Revolution',
    'Rome',
    'Ryan' ,
    'Sal',
    'Secret Weapons',
    'Shadow',
    'Shaman',
    'Sierra',
    'Solo Maneuvers',
    'Species',
    'Terminology',
    'Terry',
    'The Basics',
    'The Basics of Getting Information',
    'The Caestus',
    'The Cannery',
    'The Catacombs',
    'The CHSB',
    'The Coalition',
    'The Church of the Damned',
    'The Clan',
    'The Compound',
    'The Conclave',
    'Council',
    'The Dance Club',
    'The Dream Diner',
    'The Elder Circle',
    'The Execution',
    'The Fire',
    'The House by the Sea',
    'The Meaning of Love',
    'The Meeting',
    'The New Order',
    'The New Plan',
    'The Nightmare',
    'The Phone Call',
    'The Place Between Worlds',
    'The Plan',
    'The Runt',
    'The Shrine',
    'The Sky is Falling',
    'The Stockades',
    'The Therian Cluster',
    'The Unimaginable',
    'Therian',
    'Things Change',
    'Tristan',
    'Nick',
    'Jake',
    'Trouble in Paradise',
    'Twelve Years Ago',
    'Underground',
    'Unexpected Affairs',
    'United',
    'Valence',
    'Valentine',
    'Vampire',
    'Vengeance',
    'What I Do Best',
    'Where We Are At',
    'Wildfire',
    'Wolf',
    'Zach',
    'Freedom' 
  );
  
  $path = path('storage').'site/';
  foreach($files as $file) {
    $file = strtolower(str_replace(' ','_',$file));
    if(!is_file($path.$file.'.md')) {
      File::put($path.$file.'.md','');
      echo $path.$file.'.md created<br/>';
    }
    else {
      echo $path.$file.'.md exists<br/>';
    }
  }
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});