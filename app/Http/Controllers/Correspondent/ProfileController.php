<?php
namespace App\Http\Controllers\Correspondent;

use App\ApprovedBy as ApprovedByModel;
use App\Correspondents as CorrespondentsModel;
use App\Http\Controllers\Controller;
use App\TraitFractalResponse;
use App\TraitSessionToken;
use App\TraitValidate;
use App\Transformer\CorrespondentTransformer;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use PluginCommonSurvey\Libraries\Codes;

class ProfileController extends Controller
{
    use TraitFractalResponse;

    use TraitSessionToken;

    use TraitValidate;

    /**
     * @var CorrespondentsModel
     */
    private $correspondent;

    /**
     * @var ApprovedByModel
     */
    private $approved_by;

    private function getRules(){
        $rules =  [
            'correspondent.name' => 'required|max:150',
            'correspondent.nip' => 'required|max:100',
            'correspondent.role' => 'required|max:150',
            'correspondent.telephone_number' => 'required|max:20',
            'correspondent.handphone_number' => 'required|max:20',
            'approved_by.name' => 'required|max:150',
            'approved_by.nip' => 'required|max:100',
            'approved_by.role' => 'required|max:150',
            'approved_by.puslit' => 'required|max:150',
            'approved_by.alamat' => 'required|min:10',
            'approved_by.lembaga' => 'required|max:150',
        ];

        if($this->correspondent->nip === null){
            $rules['correspondent.nip'] .= '|unique:correspondents,nip';
        }

        if($this->approved_by->nip === null){
            $rules['approved_by.nip'] .= '|unique:approved_by,nip';
        }

        return $rules;
    }

    private function setCorrespondent(){
        $this->correspondent = CorrespondentsModel::firstOrNew(['user_id' => $this->getSessionUserID()]);
    }

    private function setApprovedBy(){
        $this->approved_by = ApprovedByModel::firstOrNew(['correspondent_id_approved' => $this->getSessionUserID()]);
    }

    private function createNewCorrespondent(Request $request){
        $this->correspondent->user_id = $this->getSessionUserID();
        $this->correspondent->name = $request->input('correspondent.name');
        $this->correspondent->nip = $request->input('correspondent.nip');
        $this->correspondent->role = $request->input('correspondent.role');
        $this->correspondent->telephone_number = $request->input('correspondent.telephone_number');
        $this->correspondent->handphone_number = $request->input('correspondent.handphone_number');
        $this->correspondent->save();
    }

    private function createNewApprovedBy(Request $request){
        $this->approved_by->correspondent_id_approved = $this->getSessionUserID();
        $this->approved_by->name = $request->input('approved_by.name');
        $this->approved_by->nip = $request->input('approved_by.nip');
        $this->approved_by->role = $request->input('approved_by.role');
        $this->approved_by->puslit = $request->input('approved_by.puslit');
        $this->approved_by->alamat = $request->input('approved_by.alamat');
        $this->approved_by->lembaga = $request->input('approved_by.lembaga');
        $this->approved_by->save();
    }

    public function store(Request $request)
    {
        $this->setCorrespondent();
        $this->setApprovedBy();

        if(!$this->runValidation($request, $this->getRules())){
            return $this->response->errorInternalError($this->validator->errors()->all());
        }

        DB::transaction(function () use ($request) {
            $this->createNewCorrespondent($request);
            $this->createNewApprovedBy($request);
        });

        return $this->response->setStatusCode(201)->withArray([
            'code' => Codes::SUCCESS,
            'message' => trans('profile successfully updated')
        ]);
    }

    public function index(Request $request){
        $row = $this->correspondent = CorrespondentsModel::find($this->getSessionUserID());
        return $this->response->withItem($row, new CorrespondentTransformer());
    }
}
