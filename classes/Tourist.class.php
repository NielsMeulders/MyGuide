<?PHP


    include_once("User.class.php");
    class Tourist extends User
    {


        public function save()
        {
            $conn = Db::getInstance();
            // errors doorsturen van de database
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $conn->prepare('INSERT INTO tbl_tourist (name,email,password) VALUES  ( :name,:email,:password)');

            $statement->bindValue(':name',$this->Name);
            $statement->bindValue(':email',$this->Email);
            $statement->bindValue(':password',$this->Password);
            $statement->execute();
        }

        public function getAll()
        {
            $conn = Db::getInstance();
            $allposts = $conn->query("SELECT * FROM tbl_tourist");
            return $allposts;
        }

        public function checkEmail($p_sCheckEmail)
        {
            $ret = true;

            $all_mails = $this->getAll();
            while($row = $all_mails->fetch(PDO::FETCH_ASSOC)) {

                if($row['email'] == $p_sCheckEmail)
                {
                    $ret = false;
                }

            }

            return $ret;
        }

    }


?>