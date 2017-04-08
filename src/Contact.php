<?php
 namespace ox\freenom;

/**
 * Class Freenom_Contact
 */
class Freenom_Contact extends Freenom_Service
{
    const CONTACTS = 'https://api.freenom.com/v2/contact/list';
    
    /**
     * @return mixed
     */
    public function getList()
    {
        $api_url = self::CONTACTS;
        
        $params = [
            'email' => $this->email,
            'password' => $this->password
        ];
       
        return $this->curl->executeGetJsonAPI($api_url, $params);
    }
    
    /**
     * @param $data
     *
     * @return mixed
     */
    public function getInfo($data)
    {
        $api_url = self::CONTACTS;
        
        $params = [
            'contact_id' => $data['contactId'],
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        return $this->curl->executeGetJsonAPI($api_url, $params);
    }
}