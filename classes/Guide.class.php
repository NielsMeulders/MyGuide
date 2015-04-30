<?PHP


    include_once("User.class.php");
    class Guide extends User
    {
        private $m_sGuideNr;
        private $m_sDescription;
        private $m_sProfilePic;

        function __set($p_sProperty, $p_vValue)
        {
            switch($p_sProperty)
            {
                case 'GuideNr':
                    if ($p_vValue!="")
                    {
                        $this->m_sGuideNr = $p_vValue;
                    }
                    else
                    {
                        $this->m_sGuideNr = null;
                    }
                    break;

                case 'Description':
                    if ($p_vValue!="")
                    {
                        $this->m_sDescription = $p_vValue;
                    }
                    else
                    {
                        $this->m_sDescription = null;
                    }
                    break;

                case 'ProfilePic':
                    if ($p_vValue!="")
                    {
                        $this->m_sProfilePic = $p_vValue;
                    }
                    else
                    {
                        $this->m_sProfilePic = null;
                    }
                    break;

                default:
                    parent::__set($p_sProperty,$p_vValue);
                    break;
            }

        }

        function __get($p_sProperty)
        {
            switch($p_sProperty)
            {
                case 'GuideNr':
                    return $this->m_sGuideNr;
                    break;

                case 'Description':
                    return $this->m_sDescription;
                    break;

                case 'ProfilePic':
                    return $this->m_sProfilePic;
                    break;

                default:
                    return parent::__get($p_sProperty);
                    break;
            }
        }


        public function save()
        {
            $conn = Db::getInstance();
            // errors doorsturen van de database
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $conn->prepare('INSERT INTO tbl_guide (name,email,password,guidenr,profile_pic, description) VALUES  ( :name,:email,:password,:guidenr,:profile_pic,:description)');

            $statement->bindValue(':name',$this->Name);
            $statement->bindValue(':email',$this->Email);
            $statement->bindValue(':password',$this->Password);
            $statement->bindValue(':guidenr',$this->GuideNr);
            $statement->bindValue(':profile_pic',$this->ProfilePic);
            $statement->bindValue(':description',$this->Description);
            $statement->execute();
        }

        public function getAll()
        {
            $conn = Db::getInstance();
            $allposts = $conn->query("SELECT * FROM tbl_guide");
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