<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersProduct extends Model
{
    //
    use Notifiable;

    protected $table = 'order_product';


    protected $primaryKey = 'op_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'op_id','order_id','order_code','product_id','product_barcode','op_quantity','op_final_value_fee','op_paypal_fee','op_sales_price','op_category','op_recv_account','op_ref_tnx','op_ref_item_id','op_ref_buyer_id','op_record_id','op_ref_paydate','op_add_time','op_update_time','shared_sign','shared_unit_price','fba_product_code','order_product_declared_value','op_length','op_width','op_height','op_weight','sc_declared_value'
    ];
}
