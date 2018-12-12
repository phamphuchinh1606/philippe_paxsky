<?php

namespace App\Services;
use App\Common\Constant;
use App\Common\DateCommon;
use App\Logics\ContractLogic;
use App\Logics\OfficeLogic;
use App\Models\RentalContract;
use App\Models\RentalContractCustomer;
use App\Models\RentalContractDetail;
use Illuminate\Http\Request;
use App\Common\AppCommon;
use DB;

class ContractService extends BaseService{
    private $contractLogic;

    private $officeLogic;

    public function __construct(ContractLogic $contractLogic, OfficeLogic $officeLogic)
    {
        $this->contractLogic = $contractLogic;
        $this->officeLogic = $officeLogic;
    }

    public function find($id){
        return $this->contractLogic->find($id);
    }

    public function getAll(){
        $contracts = $this->contractLogic->getAll();
        foreach ($contracts as $contract){
            $contract->status_name = AppCommon::nameContractStatus($contract->status);
            $contract->status_class = AppCommon::classContractStatus($contract->status);
            $contract->start_date_str = DateCommon::dateFormat($contract->start_date,'d-m-Y');
            $contract->end_date_str = DateCommon::dateFormat($contract->end_date,'d-m-Y');
        }
        return $contracts;
    }

    private function getContractInfo(Request $request, $contract = null){
        if(!isset($contract)){
            $contract = new RentalContract();
        }
        $contract->contract_code = $request->contract_code;
        $contract->contract_date = $request->contract_date;
        $contract->company_name = $request->company_name;
        $contract->tax_code = $request->tax_code;
        $contract->fax = $request->fax;
        $contract->bank_account_number = $request->bank_account_number;
        $contract->bank_account_name = $request->bank_account_name;
        $contract->amount = $request->amount;
        $contract->tax_amount = $request->tax_amount;
        $contract->discount_amount = $request->discount_amount;
        $contract->total_amount = $request->total_amount;
        $contract->start_date = $request->start_date;
        $contract->end_date = $request->end_date;
        $contract->building_id = $request->building_id;
        $contract->total_rent_acreage = $request->total_rent_acreage;
        $contract->status = $request->status;

        $customerIds = $request->customer_id;
        $customers = [];
        if(isset($customerIds)){
            foreach ($customerIds as $customerId){
                if(isset($customerId)){
                    $customers[] = $customerId;
                }
            }
        }

        $officeIds = $request->office_id;
        $offices = [];
        if(isset($officeIds)){
            foreach ($officeIds as $officeId){
                if(isset($officeId)){
                    $offices[] = $officeId;
                }
            }
        }

        $data = new \StdClass();
        $data->customers = $customers;
        $data->offices = $officeIds;
        $data->contract = $contract;

        return $data;
    }

    private function getStatusOffice($statusContract){
        $statusOffice = 1;
        switch ($statusContract){
            case Constant::$CONTRACT_STATUS_NEW:
                $statusOffice = Constant::$OFFICE_STATUS_EMPTY;
                break;
            case Constant::$CONTRACT_STATUS_BOOKING:
                $statusOffice = Constant::$OFFICE_STATUS_PLACED;
                break;
            case Constant::$CONTRACT_STATUS_RENTED:
                $statusOffice = Constant::$OFFICE_STATUS_HIRED;
                break;
            case Constant::$CONTRACT_STATUS_CANCELLED:
                $statusOffice = Constant::$OFFICE_STATUS_EMPTY;
                break;
            case Constant::$CONTRACT_STATUS_EXPIRED:
                $statusOffice = Constant::$OFFICE_STATUS_EMPTY;
                break;
        }
        return $statusOffice;
    }

    public function create(Request $request){
        $data = $this->getContractInfo($request);
        $contract = $data->contract;
        if(isset($contract->contract_code)){
            try{
                DB::beginTransaction();
                $contract = $this->contractLogic->save($contract);
                if(isset($contract)){
                    $customers = $data->customers;
                    if(isset($customers)){
                        foreach ($customers as $customerId){
                            if(isset($customerId)){
                                $contractCustomer = new RentalContractCustomer();
                                $contractCustomer->customer_id = $customerId;
                                $contractCustomer->rental_contract_id = $contract->id;
                                $this->contractLogic->saveContractCustomer($contractCustomer);
                            }
                        }
                    }

                    $offices = $data->offices;
                    if(isset($offices)){
                        foreach ($offices as $officeId){
                            if(isset($officeId)){
                                $office = $this->officeLogic->find($officeId);
                                if(isset($office)){
                                    $office->status_id = $this->getStatusOffice($contract->status);
                                    $this->officeLogic->save($office);

                                    $contractDetail  = new RentalContractDetail();
                                    $contractDetail->rental_contract_id = $contract->id;
                                    $contractDetail->office_id = $officeId;
                                    $contractDetail->rent_cost = 100;
                                    $this->contractLogic->saveContractDetail($contractDetail);
                                }
                            }
                        }
                    }
                }
                DB::commit();

            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $contract;
    }

    public function update(Request $request){
        $contract = $this->contractLogic->find($request->contract_id);
        if(isset($contract)){
            $data = $this->getContractInfo($request,$contract);
            $contract = $data->contract;
            if(isset($contract->id)){
                try{
                    DB::beginTransaction();
                    $this->contractLogic->destroyContractCustomer($contract->id);

                    //Update Empty Office
                    $contractDetails = $this->contractLogic->getContractDetailByContractId($contract->id);
                    foreach ($contractDetails as $contractDetail){
                        $office = $this->officeLogic->find($contractDetail->office_id);
                        if(isset($office)) {
                            $office->status_id = $this->getStatusOffice(Constant::$CONTRACT_STATUS_CANCELLED);
                            $this->officeLogic->save($office);
                        }
                    }

                    $this->contractLogic->destroyContractDetail($contract->id);
                    $contract = $this->contractLogic->save($contract);
                    if(isset($contract)){
                        $customers = $data->customers;
                        if(isset($customers)){
                            foreach ($customers as $customerId){
                                if(isset($customerId)){
                                    $contractCustomer = new RentalContractCustomer();
                                    $contractCustomer->customer_id = $customerId;
                                    $contractCustomer->rental_contract_id = $contract->id;
                                    $this->contractLogic->saveContractCustomer($contractCustomer);
                                }
                            }
                        }

                        $offices = $data->offices;
                        if(isset($offices)){
                            foreach ($offices as $officeId){
                                if(isset($officeId)){
                                    $office = $this->officeLogic->find($officeId);
                                    if(isset($office)){
                                        $office->status_id = $this->getStatusOffice($contract->status);
                                        $this->officeLogic->save($office);

                                        $contractDetail  = new RentalContractDetail();
                                        $contractDetail->rental_contract_id = $contract->id;
                                        $contractDetail->office_id = $officeId;
                                        $contractDetail->rent_cost = 100;
                                        $this->contractLogic->saveContractDetail($contractDetail);
                                    }
                                }
                            }
                        }
                    }
                    DB::commit();

                }catch (\Exception $ex){
                    DB::rollBack();
                    throw $ex;
                }
            }
        }

    }

}
