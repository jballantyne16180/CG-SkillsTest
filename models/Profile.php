
<?php 
    class Profile {
        // DB stuff
        private $conn;
        private $table = 'profiles';

        // Profile Properties
     
        public $name;
        public $phone;
        public $email;
        public $bio;
        public $profile_picture;
        

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Single Profile
        public function single_profile() {
            // Create query
            $query = 'SELECT p.name, p.phone, p.email, p.bio, p.profile_picture
            FROM '. $this->table .' AS p
            WHERE p.id = ? LIMIT 0,1';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->id);

            // Execute query
            $stmt->execute();
            
            // Set properties
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->name = $row['name'];
            $this->phone = $row['phone'];
            $this->email = $row['email'];
            $this->bio = $row['bio'];
            $this->profile_picture = $row['profile_picture'];
        }
        
    }