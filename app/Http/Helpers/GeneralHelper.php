<?php

if( ! function_exists('isCustomerCompany')){
    function isCustomerCompany($user_id, $company_id){

        $company = \App\Models\Customer::where('user_id', $user_id)
                            ->where('company_id', $company_id)
                            ->first();

        if(!is_null($company))
            return true;
        else
            return false;
    }

}

if( ! function_exists('getTotalOutstanding')){
    function getTotalOutstanding($customer_id, $company_id){
        $transactions = \App\Models\Transaction::where('customer_id', $customer_id)
                                               ->where('company_id', $company_id)
                                               ->get();

        $total = 0;

        foreach($transactions as $data){
            $total += $data->outstanding_balance;
        }

        return $total;
    }
}