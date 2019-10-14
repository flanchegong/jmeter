<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    protected $table = 'orders';


    protected $primaryKey = 'order_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id','order_code','reference_no','customer_id','customer_code','platform','order_platform_type','create_type','warehouse_id','to_warehouse_id','is_oda','oda_type','is_signature','is_insurance','insurance_value','order_type','country_code','sm_code','order_advance_pickup','parcel_declared_value','shipping_fee_estimate','currency_code','parcel_contents','parcel_quantity','order_status','problem_status','underreview_status','upload_express_status','anew_express_status','","ercept_status','sync_cost_status','sync_status','order_waiting_status','order_picking_status','order_charge_status','pr","_sort','pr","_quantity','add_time','update_time','order_paydate','order_pick_type','picking_basket','picker_id','remark','site_id','seller_id','buyer_id','buyer_name','buyer_mail','sync_service_status','sync_count','sc_id','sync_required_sign','sync_wms_status','sync_wms_sign','sync_wms_time','operator_note','order_exception_status','order_exception_type','order_exception_sub_type','shared_sign','is_residential','is_fba','outbound_time','is_more_box','is_attachment','address_valid_status','call_wms_time','age_detection','pre_delivery_time','payment_time','is_recommend','oms_date_create','is_flow_volume','sc_currency_code','is_cross_warehouse'
    ];
}
