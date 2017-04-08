<?php

class Freenom_Domain extends Freenom_Service
{
    const SEARCH = 'https://api.freenom.com/v2/domain/search';
    const REGISTER = 'https://api.freenom.com/v2/domain/register';
    const RENEW = 'https://api.freenom.com/v2/domain/renew';
    const GETINFO = 'https://api.freenom.com/v2/domain/getinfo';
    const MODIFY = 'https://api.freenom.com/v2/domain/modify';
    const DELETE = 'https://api.freenom.com/v2/domain/delete';
    const RESTORE = 'https://api.freenom.com/v2/domain/restore';
    const UPGRADE = 'https://api.freenom.com/v2/domain/upgrade';
    const LISTDOMAINS = 'https://api.freenom.com/v2/domain/list';
    
    public function search($data)
    {
        $api_url = self::SEARCH;
        
        $params = [
            'domainname' => $data['name'],
            'domaintype' => $data['type']
        ];
        
        $response = $this->curl->executeGetJsonAPI($api_url, $params);
        
        return $response;
    }
    
    public function register($data)
    {
        $api_url = self::REGISTER;
        
        $params = [
            'domainname' => $data['name'],
            'domaintype' => $data['type'],
            'owner_id' => $data['ownerId'],
            'domaintype' => $data['domaintype'],
            'period' => $data['period'],
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        $response = $this->curl->executePostJsonAPI($api_url, $params);
        
        return $response;
    }
    
    public function renew($data)
    {
        $api_url = self::RENEW;
        
        $params = [
            'domainname' => $data['name'],
            'period' => $data['period'],
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        $response = $this->curl->executePostJsonAPI($api_url, $params);
        
        return $response;
    }
    
    public function getInfo($data)
    {
        $api_url = self::GETINFO;
        
        $params = [
            'domainname' => $data['name'],
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        $response = $this->curl->executeGetJsonAPI($api_url, $params);
        
        return $response;
    }
    
    public function modify($data)
    {
        $api_url = self::MODIFY;
        
        $params = [
            'domainname' => $data['name'],
            'forward_url' => $data['forwardUrl'],
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        $response = $this->curl->executePutJsonAPI($api_url, $params);
        
        return $response;
    }
    
    public function delete($data)
    {
        $api_url = self::DELETE;
        
        $params = [
            'domainname' => $data['name'],
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        $response = $this->curl->executeDeleteJsonAPI($api_url, $params);
        
        return $response;
    }
    
    public function listDomains($data)
    {
        $api_url = self::LISTDOMAINS;
        
        $params = [
            'results_per_page' => $data['maxResults'],
            'email' => $this->email,
            'password' => $this->password
        ];
        
        $response = $this->curl->executeGetJsonAPI($api_url, $params);
        
        return $response;
    }
    
    public function upgrade($data)
    {
        $api_url = self::UPGRADE;
        
        $params = [
            'domainname' => $data['name'],
            'period' => $data['period'],
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        $response = $this->curl->executePostJsonAPI($api_url, $params);
        
        return $response;
    }
    
    public function restore($data)
    {
        $api_url = self::RESTORE;
        $params = [
            'domainname' => $data['name'],
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        $response = $this->curl->executePostJsonAPI($api_url, $params);
        
        return $response;
    }
    
    public function shortenURL($data)
    {
        if (!isset($data['url']) || trim($data['url']) == "") {
            throw new Freenom_Exception('Bad Request URI Field Missing', 404);
        }
        
        $api_url = self::REGISTER;
        $params = [
            'forward_url' => $data['url'],
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        return $this->curl->executePostJsonAPI($api_url, $params);
    }
}