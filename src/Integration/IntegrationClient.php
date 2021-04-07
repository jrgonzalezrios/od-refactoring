<?php

namespace OrderDesk\App\Integration;
use GuzzleHttp\Client;

class IntegrationClient{
    public $storeUrl;
    public $storeName;

    public function __construct($storeUrl){
        $this->storeUrl = $storeUrl;
    }

    public function getName() {
        return $this->storeName;
    }

    public function get_number_of_orders()
    {        
        $httpClient = new Client();
        try {
            $a = $httpClient->request('GET', $this->storeUrl.'/orders');

            if ($a->getStatusCode() == 200) {
                if (strpos($a->getBody(), '{') === 0) {
                    $data = json_decode($a->getBody(), true);
                    if (isset($data['status']) && $data['status'] == 'success') {
                        if (isset($data['items'])) {
                            return count($data['items']);
                        }
                    }
                }
            }    
            return 0;            
        } catch (\Exception $e) {            
            return 0;
        }        
        
    }

    public function getShipments(int $orderId)
    {
        $httpClient = new Client();

        try {
        $a = $httpClient->request('GET', $this->storeUrl.'/shipments/' . $orderId);
        $shipments = json_decode($a->getBody(), true);

        $shipment_info = [];

        foreach ($shipments as $shipment) {
            $shipment_info[] = isset($shipment['tracking_number'])?$shipment['tracking_number']:null;
        }

        return $shipment_info;
        } catch (\Exception $e) {
            return [];
        }
        
    }
}