<?php
namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Storage;

class Firebase
{

    public $firebase;
    public $authentication;
    public $realtimeDb;
    public $firestoreDb;
    public $cloudstorage;

    public function __construct()
    {
        $this->firebase = (new Factory)->withServiceAccount(storage_path(config('firebase.projects.app.credentials')));

        $this->authentication = $this->firebase->createAuth();

        $this->realtimeDb = $this->firebase->withDatabaseUri(config('firebase.projects.app.database.url'))->createDatabase();

        $this->cloudstorage = $this->firebase->withDatabaseUri(config('firebase.projects.app.database.url'))->createStorage();
        
        $firestore = $this->firebase->createFirestore();
        $this->firestoreDb = $firestore->database();
    }
    
    
}
