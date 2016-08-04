<?php
namespace App\Http\Controllers\Correspondent;

use App\ApprovedBy as ApprovedByModel;
use App\Correspondents as CorrespondentsModel;
use App\Http\Controllers\Controller;
use app\Libraries\Structure\SessionToken;
use App\TraitFractalResponse;
use App\TraitSessionToken;
use App\TraitValidate;
use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use DB;
use PluginCommonSurvey\Libraries\Codes;

class ProfileController extends Controller
{
    use TraitFractalResponse;

    use TraitSessionToken;

    use TraitValidate;

    private function getRules(){
        return [
            'correspondent.name' => 'required|max:150',
            'correspondent.nip' => 'required|max:100',
            'correspondent.role' => 'required|max:150',
            'correspondent.telephone_number' => 'required|max:20',
            'correspondent.handhone_number' => 'required|max:20',
            'approved_by.name' => 'required|max:150',
            'approved_by.nip' => 'required|max:100',
            'approved_by.role' => 'required|max:150',
            'approved_by.puslit' => 'required|max:150',
            'approved_by.alamat' => 'required|min:10',
            'approved_by.lembaga' => 'required|max:150',
        ];
    }

    public function store(Request $request)
    {
        if(!$this->runValidation($request, $this->getRules())){
            return $this->response->errorInternalError($this->validator->errors()->all());
        }

        DB::transaction(function () use ($request) {
            $correspondent = $this->createNewCorrespondent($request);
            $approved_by = $this->createNewApprovedBy($request);
        });

        return $this->response->setStatusCode(201)->withArray([
            'code' => Codes::SUCCESS,
            'message' => trans('profile successfully updated')
        ]);
    }

    private function createNewCorrespondent(Request $request){
        $correspondent = new CorrespondentsModel();
        $correspondent->user_id = $this->getSessionUserID();
        $correspondent->name = $request->input('correspondent.type');
        $correspondent->nip = $request->input('correspondent.nip');
        $correspondent->role = $request->input('correspondent.role');
        $correspondent->telephone_number = $request->input('correspondent.telephone_number');
        $correspondent->handhone_number = $request->input('correspondent.handhone_number');
        $correspondent->save();

        return $correspondent;
    }

    private function createNewApprovedBy(Request $request){
        $approved_by = new ApprovedByModel();
        $approved_by->correspondent_id_approved = $this->getSessionUserID();
        $approved_by->name = $request->input('approved_by.type');
        $approved_by->nip = $request->input('approved_by.nip');
        $approved_by->role = $request->input('approved_by.role');
        $approved_by->puslit = $request->input('approved_by.puslit');
        $approved_by->alamat = $request->input('approved_by.alamat');
        $approved_by->lembaga = $request->input('approved_by.lembaga');
        $approved_by->save();

        return $approved_by;
    }
}
