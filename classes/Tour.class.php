<?PHP


    class Tour
    {
        private $m_sName;
        private $m_fDuration;
        private $m_fPrice;
        private $m_sDescription;

        public function __set($p_sProperty, $p_sValue)
        {
            switch ($p_sProperty)
            {
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
                case 'Name':

                    break;

                case 'Duration':

                    break;

                case 'Price':

                    break;

                case 'Description':

                    break;
            }
        }


    }



?>