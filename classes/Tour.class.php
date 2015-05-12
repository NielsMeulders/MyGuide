<?PHP

    include_once("Db.class.php");
    class Tour
    {
        private $m_sGuideId;
        private $m_sName;
        private $m_fDuration;
        private $m_fPrice;
        private $m_sDescription;
        private $m_sProfile_pic;

        public function __set($p_sProperty, $p_sValue)
        {
            switch ($p_sProperty)
            {
                case 'GuideId':
                    $this->m_sGuideId = $p_sValue;
                    break;

                case 'Profile_pic':
                    $this->m_sProfile_pic = $p_sValue;
                    break;

                case 'Name':
                    if ($p_sValue!="")
                    {
                        $this->m_sName = $p_sValue;
                    }
                    else
                    {
                        throw new Exception("Name is required!");
                    }
                    break;

                case 'Duration':
                    if ($p_sValue!="")
                    {
                        $this->m_fDuration = $p_sValue;
                    }
                    else
                    {
                        throw new Exception("Duration is required!");
                    }
                    break;

                case 'Price':
                    if ($p_sValue!="")
                    {
                        $this->m_fPrice = $p_sValue;
                    }
                    else
                    {
                        throw new Exception("Price is required!");
                    }
                    break;

                case 'Description':
                    if ($p_sValue!="")
                    {
                        $this->m_sDescription = $p_sValue;
                    }
                    else
                    {
                        throw new Exception("Description is required!");
                    }
                    break;
            }
        }


        public function __get($p_sProperty)
        {
            switch ($p_sProperty)
            {
                case 'GuideId':
                    return $this->m_sGuideId;
                    break;

                case 'Profile_pic':
                    return $this->m_sProfile_pic;
                    break;

                case 'Name':
                    return $this->m_sName;
                    break;

                case 'Duration':
                    return $this->m_fDuration;
                    break;

                case 'Price':
                    return $this->m_fPrice;
                    break;

                case 'Description':
                    return $this->m_sDescription;
                    break;
            }
        }

        public function save()
        {
            $conn = Db::getInstance();
            // errors doorsturen van de database
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $conn->prepare('INSERT INTO tbl_tour (guide_id, name,duration,price,description,picture) VALUES  (:guide_id, :name,:duration,:price,:description,:picture)');

            $statement->bindValue(':guide_id',$this->GuideId);
            $statement->bindValue(':name',$this->Name);
            $statement->bindValue(':duration',$this->Duration);
            $statement->bindValue(':price',$this->Price);
            $statement->bindValue(':description',$this->Description);
            $statement->bindValue(':picture',$this->Profile_pic);
            $statement->execute();
        }

        public function getAll()
        {
            $conn = Db::getInstance();
            $alltours = $conn->query("SELECT tbl_tour.id as tour_id, guide_id,tbl_tour.name as tour_name,duration, price, tbl_tour.description as tour_description, tbl_guide.name as guide_name, email, password, guidenr, profile_pic, tbl_guide.description as guide_description, picture FROM tbl_tour INNER JOIN tbl_guide ON tbl_tour.guide_id = tbl_guide.id");
            return $alltours;
        }

        public function getMyTours($p_iValue)
        {
            $conn = Db::getInstance();
            $own_tours = $conn->query("SELECT tbl_tour.id as tour_id, guide_id,tbl_tour.name as tour_name,duration, price, tbl_tour.description as tour_description, tbl_guide.name as guide_name, email, password, guidenr, profile_pic, tbl_guide.description as guide_description, picture FROM tbl_tour INNER JOIN tbl_guide ON tbl_tour.guide_id = tbl_guide.id WHERE tbl_tour.guide_id = $p_iValue");
            return $own_tours;
        }

    }

?>