<?php

/**
 * Class Freenom_Domain_Transfer
 */
class Freenom_Domain_Transfer extends Freenom_Service
{
    const TRANSFERPRICE = 'https://api.freenom.com/v2/domain/transfer/price';
    const TRANSFERDOMAINREQUEST = 'https://api.freenom.com/v2/domain/transfer/request';
    const APPROVEDOMAINREQUEST = 'https://api.freenom.com/v2/domain/transfer/approve';
    const DECLINEDOMAINREQUEST = 'https://api.freenom.com/v2/domain/transfer/decline';
    const LISTDOMAINTRANSFERS = 'https://api.freenom.com/v2/domain/transfer/list';
    
    /**
     * @param $data
     *
     * @return mixed
     */
    public function getTransferPrice($data)
    {
        $api_url = self::TRANSFERPRICE;
        
        $params = [
            'domainname' => $data['name'],
            'authcode' => $data['authCode'],
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
    public function transferDomainRequest($data)
    {
        $api_url = self::TRANSFERDOMAINREQUEST;
        
        $params = [
            'domainname' => $data['domainname'],
            'authcode' => $data['authcode'],
            'period' => $data['period'],
            'owner_id' => $data['ownerId'],
            'email' => $this->email,
            'password' => $this->password,
        ];
       
        return $this->curl->executePostJsonAPI($api_url, $params);
    }
    
    public function approveDomainRequest($data)
    {
        $api_url = self::APPROVEDOMAINREQUEST;
        
        $params = [
            'domainname' => $data['domainname'],
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        $response = $this->curl->executePostJsonAPI($api_url, $params);
        
        return $response;
    }
    
    public function declineDomainRequest($data)
    {
        $api_url = self::DECLINEDOMAINREQUEST;
        
        $params = [
            'domainname' => $data['domainname'],
            'reason' => $data['reason'],
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        $response = $this->curl->executePostJsonAPI($api_url, $params);
        
        return $response;
    }
    
    public function listDomainRequest()
    {
        $api_url = self::LISTDOMAINTRANSFERS;
        
        $params = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        $response = $this->curl->executeGetJsonAPI($api_url, $params);
        
        return $response;
    }
}