<?PHP

    include_once("Db.class.php");
    abstract class User
    {
        private $m_sName;
        private $m_sEmail;
        private $m_sPassword;
        private $m_sType;
        private $m_sGuideNr;

        public function __set($p_sProperty, $p_vValue)
        {
            switch($p_sProperty)
            {
                case 'Name':
                    if ($p_vValue!="")
                    {
                        $this->m_sName = $p_vValue;
                    }
                    else
                    {
                        throw new Exception("Name is required!");
                    }
                    break;

                case 'Email':
                    if ($p_vValue!="")
                    {
                        if ($this->checkEmail($p_vValue) === true)
                        {
                            $this->m_sEmail = $p_vValue;
                        }
                        else
                        {
                            throw new Exception("Email is already in use!");
                        }
                    }
                    else
                    {
                        throw new Exception("Email is required!");
                    }
                    break;

                case 'Password':
                    if ($p_vValue!="")
                    {
                        $options = array('cost' => 12);
                        $this->m_sPassword = password_hash($p_vValue, PASSWORD_BCRYPT, $options);
                    }
                    else
                    {
                        throw new Exception("Password is required!");
                    }
                    break;

                case 'Type':
                    if ($p_vValue!="")
                    {
                        $this->m_sType = $p_vValue;
                    }
                    else
                    {
                        throw new Exception("Type is required!");
                    }
                    break;

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
            }
        }

        public function __get($p_sProperty)
        {
            switch($p_sProperty)
            {
                case 'Name':
                    return $this->m_sName;
                    break;

                case 'Email':
                    return $this->m_sEmail;
                    break;

                case 'Password':
                    return $this->m_sPassword;
                    break;

                case 'Type':
                    return $this->m_sType;
                    break;
            }
        }

        public function save()
        {
            $conn = Db::getInstance();
            // errors doorsturen van de database
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $conn->prepare('INSERT INTO tbl_guide (name,email,password,guidenr) VALUES  ( :name,:email,:password,:guidenr)');

            $statement->bindValue(':name',$this->Name);
            $statement->bindValue(':email',$this->Email);
            $statement->bindValue(':password',$this->Password);
            $statement->bindValue(':guidenr',$this->GuideNr);
            $statement->execute();
        }

        public function getAll()
        {
            $conn = Db::getInstance();
            $allposts = $conn->query("SELECT * FROM tbl_guide");
            return $allposts;
        }

        public function checkPass($pass1, $pass2)
        {
            if (strlen($pass1)<=5)
            {
                throw new Exception("Password is too short!");
            }
            else
            {
                if ($pass1 === $pass2)
                {

                }
                else
                {
                    throw new Exception("Passwords don't match!");
                }
            }
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