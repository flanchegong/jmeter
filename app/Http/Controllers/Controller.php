<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 返回数据
     *
     * @param string $data
     * @param string $code
     * @param string $msg
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function data($data = '', $code = '200', $msg = 'SUCCESS')
    {
        return response()->json([
            'data' => $data,
            'code' => $code,
            'msg'  => $msg,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * 请求成功返回
     *
     * @param string $code
     * @param string $msg
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function success($code = '200', $msg = 'SUCCESS')
    {
        return response()->json([
            'code' => $code,
            'msg'  => $msg,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * 请求失败返回
     *
     * @param string $err_code
     * @param string $err_msg
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function error($err_code = '1001', $err_msg = 'ERROR')
    {
        return response()->json([
            'err_code' => $err_code,
            'err_msg'  => $err_msg,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
