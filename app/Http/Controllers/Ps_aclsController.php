<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Exceptions;

use App\Ps_acl;

class Ps_aclsController extends Controller
{
    public function autoIns(Ps_acl $ps_acl)
    {
        $ins = Ps_acl::create(['name' => '']);
        return redirect()->route('ps_acl.edit', ['id' => $ins->id]); // you redirect logic here..
    }

    public function master_list()
{
    $ps_acls = Ps_acl::orderBy('id', 'desc')->paginate(3);// change your number here
    $ps_acls = $ps_acls->appends(Input::except('page'));
    return view('ps_acl/ps_acl_list', compact('ps_acls'));
}

    public function detail(Ps_acl $ps_acl, $id)
    {
        $ps_acl = Ps_acl::find($id);
        return view('ps_acl/ps_acl_detail', compact('ps_acl'));
    }

    public function edit(Ps_acl $ps_acl, $id) // for edit get
    {
        $ps_acl = Ps_acl::find($id);
        if (count($ps_acl) < 1) { // later refine this and do the same for update..
            echo 'record not found ';
            exit;
        }
        return view('ps_acl/ps_acl_edit', compact('ps_acl'));
    }


    public function edit_post(Ps_acl $ps_acl, $id) // for update
    { //        validation STARTS // working
        $this->validate(request(), [
            'uid' => 'required|min:1|int',
            'gid' => 'required|min:1|int',
        ]);

// TODO if record does not exist exit here..


        try {
            $ps_acl_update = Ps_acl::find($id);
// dynamic generation
            $ps_acl_update->name = request('name');
            $ps_acl_update->uid = request('uid');
            $ps_acl_update->gid = request('gid');
            $ps_acl_update->comments = request('comments');
            $ps_acl_update->del_stat = request('del_stat');
            $ps_acl_update->save();
        } catch (\Exception $e) {
            echo 'Error Code: '. $e->getCode() . '<BR>';   // err code
            echo $e->getMessage();   // err message
//            var_dump($e); // full err array
            exit;
        }


        session()->flash('message', ' Thank you. Document updated ');
        session()->flash('type', 'success'); // OPTIONS bs-class : info|success|danger|warning
        return redirect()->route('ps_acl.master_list'); // change your location here.. note a slash scape is required here
    }
// class close
}

?>