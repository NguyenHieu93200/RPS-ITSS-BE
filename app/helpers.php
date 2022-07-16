<?php

use Illuminate\Support\Facades\Log;

if (!function_exists('_error')) {
    /**
     * @param $data
     * @param $message
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function _error($data = null, $message = null, $statusCode = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}

if (!function_exists('_success')) {
    /**
     * @param $data
     * @param $message
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function _success($data = null, $message = null, $statusCode = null)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}

if (!function_exists('_errorSystem')) {

    /**
     * @param $exception
     * @return \Illuminate\Http\JsonResponse
     */

    function _errorSystem($exception)
    {
        Log::error(__METHOD__ . ' - ' . __LINE__ . ' : ' . $exception->getMessage());
        return _error(null, __('message.systemError'), HTTP_BAD_REQUEST);
    }
}

if (!function_exists('_paginateCustom')) {
    function _paginateCustom($data, $params)
    {
        $pageSize = $params['page_size'] ?? PAGE_SIZE;
        $data = $data->paginate($pageSize);
        return $data->getCollection()->toArray();
    }
}

if (!function_exists('_trimSpace')) {
    /**
     * @param $value
     * @return string
     */

    function _trimSpace($value)
    {
        mb_internal_encoding('UTF-8');
        mb_regex_encoding('UTF-8');
        $value = mb_ereg_replace("^[\n\r\s\t　]+", '', $value);
        $value = mb_ereg_replace("[\n\r\s\t　]+$", '', $value);
        return trim($value);
    }
}
