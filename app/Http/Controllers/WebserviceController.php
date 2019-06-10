<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use App\User;
use DB;

class WebserviceController extends Controller
{
    public function __construct()
    {

    }

    public function episode(Request $request){

        $field = ['compcode','mrn','episno','admsrccode','epistycode','case_code','ward','bedtype','room','bed','admdoctor','attndoctor','refdoctor','prescribedays','pay_type','pyrmode','climitauthid','crnumber','depositreq','deposit','pkgcode','billtype','remarks','episstatus','episactive','adddate','adduser','reg_date','reg_time','dischargedate','dischargeuser','dischargetime','dischargedest','allocdoc','allocbed','allocnok','allocpayer','allocicd','lastupdate','lastuser','lasttime','procode','dischargediag','lodgerno','regdept','diet1','diet2','diet3','diet4','diet5','glauthid','treatcode','diagcode','complain','diagfinal','clinicalnote','conversion','newcaseP','newcaseNP','followupP','followupNP','bed2','bed3','bed4','bed5','bed6','bed7','bed8','bed9','bed10','diagprov','visitcase','PkgAutoNo','AgreementID','AdminFees','EDDept'];

        if($request->oper == 'add'){
            $array_insert = [];
            foreach($field as $key => $value){
                $array_insert[$value] = $request[strtolower($value)];
            }

            DB::table('hisdb.episode')->insert($array_insert);
        }else if($request->oper == 'upd'){
            $array_insert = [];
            foreach($field as $key => $value){
                $array_insert[$value] = $request[strtolower($value)];
            }

            DB::table('hisdb.episode')
                ->where('mrn','=',$request['where_mrn'])
                ->where('episno','=',$request['where_episno'])
                ->update($array_insert);
        }
    }

    public function patmast(Request $request){

        $field = ['CompCode','MRN','Episno','Name','Call_Name','addtype','Address1','Address2','Address3','Postcode','citycode','AreaCode','StateCode','CountryCode','telh','telhp','telo','Tel_O_Ext','ptel','ptel_hp','ID_Type','idnumber','Newic','Oldic','icolor','Sex','DOB','Religion','AllergyCode1','AllergyCode2','Century','Citizencode','OccupCode','Staffid','MaritalCode','LanguageCode','TitleCode','RaceCode','bloodgrp','Accum_chg','Accum_Paid','first_visit_date','Reg_Date','last_visit_date','last_episno','PatStatus','Confidential','Active','FirstIpEpisNo','FirstOpEpisNo','AddUser','AddDate','Lastupdate','LastUser','OffAdd1','OffAdd2','OffAdd3','OffPostcode','MRFolder','MRLoc','MRActive','OldMrn','NewMrn','Remarks','RelateCode','ChildNo','CorpComp','Email','Email_official','CurrentEpis','NameSndx','BirthPlace','TngID','PatientImage','pAdd1','pAdd2','pAdd3','pPostCode','DeptCode','DeceasedDate','PatientCat','PatType','idno','upduser','upddate','recstatus','loginid'];
        echo $request['name'];
        if($request->oper == 'add'){
            $array_insert = [];
            foreach($field as $key => $value){
                $array_insert[$value] = $request[strtolower($value)];
            }

            $table = DB::table('hisdb.pat_mast')->insert($array_insert);

        }else if($request->oper == 'upd'){
            $array_insert = [];
            foreach($field as $key => $value){
                $array_insert[$value] = $request[strtolower($value)];
            }

            DB::table('hisdb.pat_mast')
                ->where('mrn','=',$request['where_mrn'])
                ->update($array_insert);
        }
    }
    
}
