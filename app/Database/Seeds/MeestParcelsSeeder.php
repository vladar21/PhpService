<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MeestParcelsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'parcelNumber' => 'KEY0000000000002UA',
            'parcelNumberInternal' => '517024559',
            'parcelNumberParent' => null,
            'partnerKey' => 'KEY_TEST01',
            'bagId' => 'TestBagId',
            'carrierLastMile' => 'MEEST',
            'createReturnParcel' => false,
            'returnCarrier' => '',
            'cod' => 820,
            'codCurrency' => 'UAH',
            'deliveryCost' => null,
            'serviceType' => 'Home Delivery',
            'totalValue' => 30,
            'currency' => 'EUR',
            'dimensions_height' => 20,
            'dimensions_length' => 25,
            'dimensions_width' => 10,
            'fulfillment' => 'FULL',
            'incoterms' => 'DDP',
            'iossVatIDenc' => 'EuLyAWjprs9+SqY9n1vIjl7CvqoWoKcDFSDaQE+mmE4=',
            'senderID' => '5FD924625F6AB16A',
            'weight' => 0.5,
            'meest_recipients_id' => , // Замените на соответствующий ID получателя
            'meest_senders_id' => ,    // Замените на соответствующий ID отправителя
            'meest_items_id' => ,
        ];

        $this->db->table('meest_parcels')->insert($data);
    }
}
