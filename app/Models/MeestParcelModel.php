<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model class for managing meest parcel's data.
 */
class MeestParcelModel extends Model
{
    // Database configuration
    protected $table = 'meest_parcels';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    // Allowed fields in the database
    protected $allowedFields = [
        'bill_invoice_id',
        'parcelNumber',
        'parcelNumberInternal',
        'parcelNumberParent',
        'partnerKey',
        'bagId',
        'carrierLastMile',
        'createReturnParcel',
        'returnCarrier',
        'cod',
        'codCurrency',
        'deliveryCost',
        'serviceType',
        'totalValue',
        'currency',
        'fulfillment',
        'incoterms',
        'iossVatIDenc',
        'senderID',
        'weight',
        'meest_senders_id',
        'meest_recipients_id',
        'created_at',
        'updated_at'
    ];

    // Dates configuration
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get the sender information associated with this parcel.
     *
     * @return \CodeIgniter\Database\BaseBuilder|null The sender information or null if not found.
     */
    public function sender()
    {
        return $this->belongsTo(MeestSenderRecipientModel::class, 'meest_senders_id', 'id');
    }

    /**
     * Get the recipient information associated with this parcel.
     *
     * @return \CodeIgniter\Database\BaseBuilder|null The recipient information or null if not found.
     */
    public function recipient()
    {
        return $this->belongsTo(MeestSenderRecipientModel::class, 'meest_recipients_id', 'id');
    }

    /**
     * Get parcels based on the provided ID or retrieve all parcels if ID is false.
     *
     * @param int|false $id The ID of the parcel to retrieve, or false to retrieve all parcels.
     *
     * @return array|null An array of parcels or null if not found.
     */
    public function getParcels($id = false)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('meest_parcels');
        $builder->select('*, meest_parcels.id as id, s.name as name_sender, r.name as name_recipient');
        $builder->join('meest_senders_recipients as s', 's.id = meest_parcels.meest_senders_id', 'left');
        $builder->join('meest_senders_recipients as r', 'r.id = meest_parcels.meest_recipients_id', 'left');

        if ($id === false) $result = $builder->get()->getResultArray();
        else {
            $result = $builder->where(['meest_parcels.id' => $id])->get()->getRowArray();
        }

        return $result;
    }

    /**
     * Get parcel data for the provided parcel ID.
     *
     * @param int $id The ID of the parcel to retrieve data for.
     *
     * @return array|null An array containing parcel data or null if not found.
     */
    public function getParcelData($id)
    {
        $result = false;
        if ($id !== false){
            $db = \Config\Database::connect();
            $builder = $db->table('meest_parcels');
            $selectParcel = "id, parcelNumber, parcelNumberInternal, parcelNumberParent, partnerKey, bagId, carrierLastMile, createReturnParcel, returnCarrier, cod, codCurrency, deliveryCost, serviceType, totalValue, currency, fulfillment, incoterms, iossVatIDenc, senderID, weight, meest_senders_id, meest_recipients_id";
            $parcelData = $builder->select($selectParcel)->where(['id' => $id])->get()->getRowArray();

            $modelSenderRecipient = new MeestSenderRecipientModel();
            if ($parcelData['meest_senders_id']){
                $sender = $modelSenderRecipient->getClients($parcelData['meest_senders_id']);
                unset($parcelData['meest_senders_id']);
                unset($sender['id']);
                unset($sender['bill_client_id']);
                unset($sender['created_at']);
                unset($sender['updated_at']);
                $parcelData['sender'] = $sender;
            }
            if ($parcelData['meest_recipients_id']){
                $recipient = $modelSenderRecipient->getClients($parcelData['meest_recipients_id']);
                unset($parcelData['meest_recipients_id']);
                unset($recipient['id']);
                unset($recipient['bill_client_id']);
                unset($recipient['created_at']);
                unset($recipient['updated_at']);
                $parcelData['recipient'] = $recipient;
            }

            $modelItem = new MeestItemModel();
            $items = $modelItem->getParcelItemsByMeesParcelId($parcelData['id']);
            if (count($items) > 0){
                unset($parcelData['id']);
                for($i = 0; $i < count($items); $i++){
                    unset($items[$i]['id']);
                    unset($items[$i]['meest_parcels_id']);
                    unset($items[$i]['created_at']);
                    unset($items[$i]['updated_at']);
                }
                $parcelData['items'] = $items;
            }

        }

        return $parcelData;
    }

    /**
     * Create a new parcel number based on the provided parameters.
     *
     * @param string $ClientTLA       The client TLA code.
     * @param string $DestCountryIso2 The destination country ISO2 code.
     *
     * @return string The new parcel number.
     */
    public function createParcelNumber($ClientTLA = 'KEY', $DestCountryIso2 = 'UA')
    {
        $lastRecord = $this->select('parcelNumber')
            ->orderBy('parcelNumber', 'DESC')
            ->first();

        if ($lastRecord) {
            $lastKey = (int) substr($lastRecord['parcelNumber'], strlen($ClientTLA), -strlen($DestCountryIso2));
            $newKey = $lastKey + 1;
        } else {
            // Если это первая запись
            $newKey = 1;
        }
        $newKeyString = str_pad($newKey, 13, '0', STR_PAD_LEFT); // Здесь 13 означает желаемую длину числовой последовательности

        $newParcelNumber = $ClientTLA . $newKeyString . $DestCountryIso2;

        return $newParcelNumber;
    }

    /**
     * Get the parent parcel number for the latest parcel in the database.
     *
     * @return string|null The parent parcel number or null if none found.
     */
    public function getParcelNumberParent(){
        $lastRecord = $this->select('parcelNumber')
            ->orderBy('parcelNumber', 'DESC')
            ->first();
        if ($lastRecord){
            return $lastRecord['parcelNumber'];
        }else{
            return null;
        }
    }

    /**
     * Get a Mees parcel by its associated bill invoice ID.
     *
     * @param int $bill_invoice_id The bill invoice ID to retrieve the Mees parcel for.
     *
     * @return array|null An array containing Mees parcel data or null if not found.
     */
    public function getMeesParcelByBillInvoiceId($bill_invoice_id){
        return $this->asArray()->where(['bill_invoice_id' => $bill_invoice_id])->first();
    }

    /**
     * Delete a Mees parcel and its associated items by ID.
     *
     * @param int $id The ID of the Mees parcel to delete.
     *
     * @throws \Exception If the parcel or associated items are not found.
     */
    public function deleteParcel($id){
        try{
            $model = new MeestParcelModel();
            $record = $model->find($id);

            if ($record) {

                $modelItems = new MeestItemModel();
                $whereCondition = ['meest_parcels_id' => $record['id']];
                $modelItems->where($whereCondition)->delete();

                $model->delete($id);

                return true;
            } else {
                throw new \Exception(lang('app_lang.deleted_object_not_found'));
            }
        }catch(\Throwable $ex){
            throw new \Exception($ex->getMessage());
        }
    }
}
