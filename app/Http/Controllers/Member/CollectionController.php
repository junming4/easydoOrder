<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Api\ApiV2Controller;
use App\Http\Requests\CollectionCreateRequest;
use App\Repositories\Collection\CollectionContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends ApiV2Controller
{
    protected $collectionContract;
    public function __construct(CollectionContract $collectionContract)
    {
        $this->collectionContract = $collectionContract;
    }

    //
    public function index()
    {
        return view('member.collection.index');
    }

    /**
     * create
     *
     * @param CollectionCreateRequest $collectionCreateRequest
     * @return \Illuminate\Http\JsonResponse
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年09月01日
     */
    public function create(CollectionCreateRequest $collectionCreateRequest)
    {
        $data = $collectionCreateRequest->fillData();
        $collectionObj = $this->collectionContract->getInfo($data['stg_id'], $data['type']);
        if(!$collectionObj->isEmpty()){
            return $this->setStatusCode(400)->responseError('您已经收藏过了');
        }
        if($this->collectionContract->create($data)){
            $result['msg'] = '添加成功！';
            return $this->setStatusCode(200)->responseSuccess($result);
        }
        return $this->setStatusCode(500)->responseError('添加失败');
    }
}
