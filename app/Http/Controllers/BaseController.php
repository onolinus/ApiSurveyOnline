<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;


abstract class BaseController extends Controller
{
    /**
     * @var Response
     */
    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    protected function getPerPage(){
        return 10;
    }

    protected function usePaginationByDefault(){
        return true;
    }

    abstract protected function getModelName();

    abstract protected function getModelLabel();

    /**
     * @return \League\Fractal\TransformerAbstract
     */
    abstract protected function getTransformer();

    protected function paging(){
        $rows = call_user_func_array('\\App\\' . $this->getModelName() . '::paginate', [$this->getPerPage()]);
        if(empty($rows) || count($rows) === 0){
            return $this->response->errorNotFound(trans('errors.data_empty', ['dataname' => $this->getModelLabel()]));
        }
        return $this->response->withPaginator($rows, $this->getTransformer());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($this->usePaginationByDefault() || $request->page){
            return $this->paging();
        }

        $rows = call_user_func('\\App\\' . $this->getModelName() . '::all');
        if(empty($rows) || count($rows) === 0){
            return $this->response->errorNotFound(trans('errors.data_empty', ['dataname' => $this->getModelLabel()]));
        }
        return $this->response->withCollection($rows, $this->getTransformer(), null, null, [
            'total' => count($rows)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = call_user_func_array('\\App\\' . $this->getModelName() . '::find', [$id]);
        if(empty($row) || count($row) === 0){
            return $this->response->errorNotFound(trans('errors.data_not_found', ['dataname' => $this->getModelName()]));
        }

        return $this->response->withItem($row, $this->getTransformer());
    }
}
