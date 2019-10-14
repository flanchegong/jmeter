<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Webpatser\Uuid\Uuid;
class IndexController extends Controller
{
    //

    public function index(){
        DB::beginTransaction();
        $str1 = UUID::generate();
        $str2 = UUID::generate();
        $str3 = UUID::generate();
        try {
            $sql="INSERT INTO `orders` (order_code,reference_no,customer_id,customer_code,platform,order_platform_type,create_type,warehouse_id,to_warehouse_id,is_oda,oda_type,is_signature,is_insurance,insurance_value,order_type,country_code,sm_code,order_advance_pickup,parcel_declared_value,shipping_fee_estimate,currency_code,parcel_contents,parcel_quantity,order_status,problem_status,underreview_status,upload_express_status,anew_express_status,intercept_status,sync_cost_status,sync_status,order_waiting_status,order_picking_status,order_charge_status,print_sort,print_quantity,add_time,update_time,order_paydate,order_pick_type,picking_basket,picker_id,remark,site_id,seller_id,buyer_id,buyer_name,buyer_mail,sync_service_status,sync_count,sc_id,sync_required_sign,sync_wms_status,sync_wms_sign,sync_wms_time,operator_note,order_exception_status,order_exception_type,order_exception_sub_type,shared_sign,is_residential,is_fba,outbound_time,is_more_box,is_attachment,address_valid_status,call_wms_time,age_detection,pre_delivery_time,payment_time,is_recommend,oms_date_create,is_flow_volume,sc_currency_code,is_cross_warehouse) 
VALUES ('".$str1."', '', 367243, '00000319', 'ALIEXPRESS', 'transfer', 'hand', 1, 1, 0, 0, 0, 0, 0.000, 0, 'KV', 'BOCI-SMALL', 0, 8093.00, 232.000, 'RMB', '', 5, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2019-10-09 14:51:37', '0000-00-00 00:00:00', 0, '', 0, '', '', '', '', '', '', 2, 0, 107, 0, 1, 0, '0000-00-00 00:00:00', '', 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', NULL, 0, '0000-00-00 00:00:00', 1, 'AUD', 1),
('".$str2."', '', 277893, '00001455', 'ALIEXPRESS', 'transfer', 'hand', 1, 1, 0, 0, 0, 0, 0.000, 0, 'KV', 'BOCI-SMALL', 0, 42442.00, 301.000, 'RMB', '', 3, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2019-10-09 14:51:37', '0000-00-00 00:00:00', 0, '', 0, '', '', '', '', '', '', 1, 0, 58, 0, 1, 0, '0000-00-00 00:00:00', '', 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', NULL, 0, '0000-00-00 00:00:00', 1, 'AUD', 1),
('".$str3."', '', 1487377, '00001b64', 'ALIEXPRESS', 'transfer', 'hand', 1, 1, 0, 0, 0, 0, 0.000, 0, 'KV', 'BOCI-SMALL', 0, 10274.00, 422.000, 'RMB', '', 4, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2019-10-09 14:51:37', '0000-00-00 00:00:00', 0, '', 0, '', '', '', '', '', '', 3, 0, 118, 0, 1, 0, '0000-00-00 00:00:00', '', 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', NULL, 0, '0000-00-00 00:00:00', 1, 'AUD', 1)";
            DB::insert($sql);
            DB::select("SELECT orders.order_code,orders.country_code,orders.sm_code,orders.add_time,orders.buyer_name,orders.buyer_mail,orders.platform from orders  where order_id = :id", ['id' => 1]);
            DB::select("SELECT orders.order_code,orders.country_code,orders.sm_code,orders.add_time,orders.buyer_name,orders.buyer_mail,orders.platform from orders  where order_id = :id", ['id' => 2]);
            DB::select("SELECT orders.order_code,orders.country_code,orders.sm_code,orders.add_time,orders.buyer_name,orders.buyer_mail,orders.platform from orders  where order_id = :id", ['id' => 3]);
            $rs=DB::commit();

            return $this->data($rs);
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            $error=$e->getMessage();
            Log::debug($error);
            // something went wrong
        }
        return $this->error();
    }

    public function home(){
        DB::beginTransaction();
        try {
            $str = UUID::generate();
            $rs=DB::select("SELECT order_id from orders  order by order_id desc limit 1");
            $orderId=$rs[0]->order_id;
            $sql="INSERT INTO `order_product` (order_id,order_code,product_id,product_barcode,op_quantity,op_final_value_fee,op_paypal_fee,op_sales_price,op_category,op_recv_account,op_ref_tnx,op_ref_item_id,op_ref_buyer_id,op_record_id,op_ref_paydate,op_add_time,op_update_time,shared_sign,shared_unit_price,fba_product_code,order_product_declared_value,op_length,op_width,op_height,op_weight,sc_declared_value) VALUES ($orderId,'".$str."', 920, '000012-18005000', 50, 0.000, 0.000, 0.000, 400000, '', '', '', '', '', '0000-00-00 00:00:00', '2019-10-09 21:02:02', '0000-00-00 00:00:00', 0, 0.00, NULL, 0.00, 121.00, 45.00, 45.00, 45.000, 0.00)";
            DB::insert($sql);
            DB::select("SELECT order_id,order_code,product_id,product_barcode,op_quantity,op_category,op_length,op_width,op_height,op_weight from order_product  where op_id = :id", ['id' => 1]);
            DB::select("SELECT order_id,order_code,product_id,product_barcode,op_quantity,op_category,op_length,op_width,op_height,op_weight from order_product  where op_id = :id", ['id' => 2]);
            DB::select("SELECT order_id,order_code,product_id,product_barcode,op_quantity,op_category,op_length,op_width,op_height,op_weight from order_product  where op_id = :id", ['id' => 3]);
            $rs=DB::commit();

            return $this->data($rs);
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            $error=$e->getMessage();
            Log::debug($error);
            // something went wrong
        }
        return $this->error();
    }

    function objectToArray($object) {
        //先编码成json字符串，再解码成数组
        return json_decode(json_encode($object), true);
    }
}
