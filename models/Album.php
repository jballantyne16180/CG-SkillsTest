
<?php 
    class Album {
        // DB stuff
        private $conn;
        private $table = 'photos';

        // Album Properties
        public $id;
        public $profile_id;
        public $title;
        public $description;
        public $img;
        public $date;
        public $featured;

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }
        
        // Get Album
        public function profile_album($i) {
            // Create query
            $query = 'SELECT a.id, a.title, a.description, a.img, a.date , a.featured
            FROM '. $this->table .' AS a
            WHERE a.profile_id = '.$i;
      
            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }
    }