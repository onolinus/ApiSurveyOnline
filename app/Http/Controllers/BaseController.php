<?php

namespace App\Http\Controllers;

use App\TraitFractalResponse;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Requests;


abstract class BaseController extends Controller
{
    use TraitFractalResponse;

    protected function initialize(){
        return null;
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

    protected function getListTransformer(){
        return $this->getTransformer();
    }

    protected function paging(){
        $models = call_user_func_array('\\App\\' . $this->getModelName() . '::paginate', [$this->getPerPage()]);
        if(empty($models) || count($models) === 0){
            return $this->response->errorNotFound([trans('errors.data_empty', ['dataname' => $this->getModelLabel()])]);
        }
        return $this->response->withPaginator($models, $this->getListTransformer());
    }

    protected function filter(Request $request){
        $models = call_user_func_array('\\App\\' . $this->getModelName() . '::ofType', [$request->filter])->paginate($this->getPerPage());

        if(empty($models) || count($models) === 0){
            return $this->response->errorNotFound([trans('errors.data_empty', ['dataname' => $this->getModelLabel()])]);
        }

        return $this->response->withPaginator($models, $this->getListTransformer());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->filter){
            return $this->filter($request);
        }

        if($this->usePaginationByDefault() || $request->page){
            return $this->paging();
        }

        $models = call_user_func('\\App\\' . $this->getModelName() . '::all');
        if(empty($models) || count($models) === 0){
            return $this->response->errorNotFound([trans('errors.data_empty', ['dataname' => $this->getModelLabel()])]);
        }
        return $this->response->withCollection($models, $this->getListTransformer(), null, null, [
            'total' => count($models)
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
        $models = call_user_func_array('\\App\\' . $this->getModelName() . '::find', [$id]);
        if(empty($models) || count($models) === 0){
            return $this->response->errorNotFound([trans('errors.data_not_found', ['dataname' => $this->getModelLabel()])]);
        }

        return $this->response->withItem($models, $this->getTransformer());
    }
}
