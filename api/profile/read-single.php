<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Profile.php';
    include_once '../../models/Album.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post object
    $profile = new Profile($db);
    $album = new Album($db);

    // Get ID
    $profile->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get Profile and associated Album 
    $profile->single_profile();
    $album = $album->profile_album($profile->id);
    
    // Create arrays
        $album_arr['album'] = array();

        while($row = $album->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $photos = array(
                'id' => $id,
                'title' => $title,
                'description' => html_entity_decode($description),
                'img' => $img,
                'date' => $date,
                'featured' => $featured
            );
            //push to album
            array_push($album_arr['album'], $photos);
        }


        $profile_arr = array(
            'name' => $profile->name,
            'phone' => $profile->phone,
            'email' => $profile->email,
            'bio' => html_entity_decode($profile->bio),
            'profile_picture' => $profile->profile_picture,
            'album' => $album_arr['album']
        );

        
        
        // Make JSON
        print_r(json_encode($profile_arr));