<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemoController extends Controller
{
    /**
     * メモ一覧リソース
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return response()->json($request->user()->memos()->latest()->get(), 200);
    }
}
