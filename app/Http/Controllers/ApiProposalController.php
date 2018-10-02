<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Proposal;

class ApiProposalController extends Controller
{
    private $jwtauth;

    public function __construct(JWTAuth $jwtauth)

    {
        $this->jwtauth = $jwtauth;
        $this->middleware('jwt.auth');
    }

    ////////////////////    Show All Proposals     ///////////////////////

    public function index()
    {
        $proposals = Proposal::get();
        return response()->json($proposals);
    }

    ////////////////////    Show Single Proposal   ////////////////////

    public function show($id)
    {
        $proposal = Proposal::find($id);
        return response()->json($proposal);
    }

    ////////////////////    Create New Proposal     ////////////////////

    public function showMyProposals()
    {
        $proposals = Proposal::where('user_id', auth()->user()->id)->get();
        return response()->json($proposals);
    }

    ////////////////////    Create New Proposal     ////////////////////

    public function create(Request $request)
    {
        $last_proposal = Proposal::orderBy('proposal_number', 'DESC')->first();

        $validator = Validator::make($request->all(), [
            'proposal_type' => 'required',
            'technical_approval' => 'required',
            'client_source' => 'required',
            'client_name' => 'required',
            'proposal_date' => 'required',
            'proposal_value' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        } else {

            $user_id = auth()->user()->id;
            $proposal_type = $request->proposal_type;
            $technical_approval = $request->technical_approval;
            if ($last_proposal) {
                $proposal_number = sprintf("%05d", $last_proposal->proposal_number + 1);
            } else {
                $proposal_number = sprintf("%05d", +1);
            }
            $client_source = $request->client_source;
            $sales_agent = auth()->user()->first_name . ' ' . auth()->user()->last_name;
            $client_name = $request->client_name;
            $proposal_date = $request->proposal_date;
            $proposal_value = $request->proposal_value;


            $Cproposal_type = explode(" ", $proposal_type);
            if (count($Cproposal_type) == 1) {
                $cpt = strtoupper(substr($Cproposal_type[0], 0, 2));;
            } else {
                foreach ($Cproposal_type as $pt) {
                    $cpt[] = ucfirst(substr($pt, 0, 1));
                }
                $cpt = implode('', $cpt);
            }

            $Ctechnical_approval = explode(" ", $technical_approval);
            if (count($Ctechnical_approval) == 1) {
                $cta = strtoupper(substr($Ctechnical_approval[0], 0, 2));;
            } else {
                foreach ($Ctechnical_approval as $ta) {
                    $cta[] = ucfirst(substr($ta, 0, 1));
                }
                $cta = implode('', $cta);
            }

            $Cclient_source = explode(" ", $client_source);
            if (count($Cclient_source) == 1) {
                $ccs = strtoupper(substr($Cclient_source[0], 0, 2));;
            } else {
                foreach ($Cclient_source as $cs) {
                    $ccs[] = ucfirst(substr($cs, 0, 1));
                }
                $ccs = implode('', $ccs);
            }

            $Csales_agent = explode(" ", $sales_agent);
            if (count($Csales_agent) == 1) {
                $csa = strtoupper(substr($Csales_agent[0], 0, 2));;
            } else {
                foreach ($Csales_agent as $sa) {
                    $csa[] = ucfirst(substr($sa, 0, 1));
                }
                $csa = implode('', $csa);
            }


            $proposal_code = $cpt . $cta . "-" . $proposal_number . "-" . $ccs . $csa;

            $proposal = Proposal::create([

                'user_id' => $user_id,
                'proposal_type' => $proposal_type,
                'technical_approval' => $technical_approval,
                'proposal_number' => $proposal_number,
                'client_source' => $client_source,
                'sales_agent' => $sales_agent,
                'client_name' => $client_name,
                'proposal_date' => $proposal_date,
                'proposal_value' => $proposal_value,
                'proposal_code' => $proposal_code,

            ]);


            return response()->json($proposal);
        }
    }

    ////////////////////    Update Existed Proposal     ////////////////////

    public function update($id, Request $request)
    {
        $proposal = Proposal::find($id);
        $validator = Validator::make($request->all(), [
            'proposal_type' => 'required',
            'technical_approval' => 'required',
            'client_source' => 'required',
            'client_name' => 'required',
            'proposal_date' => 'required',
            'proposal_value' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        } else {

            $user_id = auth()->user()->id;
            $proposal_type = $request->proposal_type;
            $technical_approval = $request->technical_approval;
            $proposal_number = sprintf("%05d", $proposal->proposal_number);
            $client_source = $request->client_source;
            $sales_agent = auth()->user()->first_name . ' ' . auth()->user()->last_name;
            $client_name = $request->client_name;
            $proposal_date = $request->proposal_date;
            $proposal_value = $request->proposal_value;


            $Cproposal_type = explode(" ", $proposal_type);
            if (count($Cproposal_type) == 1) {
                $cpt = strtoupper(substr($Cproposal_type[0], 0, 2));;
            } else {
                foreach ($Cproposal_type as $pt) {
                    $cpt[] = ucfirst(substr($pt, 0, 1));
                }
                $cpt = implode('', $cpt);
            }

            $Ctechnical_approval = explode(" ", $technical_approval);
            if (count($Ctechnical_approval) == 1) {
                $cta = strtoupper(substr($Ctechnical_approval[0], 0, 2));;
            } else {
                foreach ($Ctechnical_approval as $ta) {
                    $cta[] = ucfirst(substr($ta, 0, 1));
                }
                $cta = implode('', $cta);
            }

            $Cclient_source = explode(" ", $client_source);
            if (count($Cclient_source) == 1) {
                $ccs = strtoupper(substr($Cclient_source[0], 0, 2));;
            } else {
                foreach ($Cclient_source as $cs) {
                    $ccs[] = ucfirst(substr($cs, 0, 1));
                }
                $ccs = implode('', $ccs);
            }

            $Csales_agent = explode(" ", $sales_agent);
            if (count($Csales_agent) == 1) {
                $csa = strtoupper(substr($Csales_agent[0], 0, 2));;
            } else {
                foreach ($Csales_agent as $sa) {
                    $csa[] = ucfirst(substr($sa, 0, 1));
                }
                $csa = implode('', $csa);
            }


            $proposal_code = $cpt . $cta . "-" . $proposal_number . "-" . $ccs . $csa;

            $proposal->update([

                'user_id' => $user_id,
                'proposal_type' => $proposal_type,
                'technical_approval' => $technical_approval,
                'proposal_number' => $proposal_number,
                'client_source' => $client_source,
                'sales_agent' => $sales_agent,
                'client_name' => $client_name,
                'proposal_date' => $proposal_date,
                'proposal_value' => $proposal_value,
                'proposal_code' => $proposal_code,

            ]);


            return response()->json($proposal);
        }
    }

    ////////////////////    Delete Existed Proposal     ////////////////////

    public function delete($id)
    {
        $proposal = Proposal::find($id);
        if ($proposal) {
            $proposal->delete($id);

            $returnData = array(
                'success' => 'Proposal Deleted Successfully!'
            );
            return response()->json($returnData, 200);
        } else {
            $returnData = array(
                'error' => 'Proposal Not Found!'
            );
            return response()->json($returnData, 500);
        }
    }
}
