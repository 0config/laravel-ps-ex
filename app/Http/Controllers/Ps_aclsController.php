<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Ps_acl;

class Ps_aclsController extends Controller
{
    public function autoIns(Ps_acl $ps_acl)
    {
        $ins = Ps_acl::create(['name' => '']);
        return redirect( '/ps_acl/' . $ins->id . "/edit/"); // you redirect logic here..
    }

    public function edit(Ps_acl $ps_acl, $id) // for update
    { //        validation STARTS // working
        $this->validate(request(), [
            'uid' => 'required|min:1|int',
            'gid' => 'required|min:1|int',
        ]) ;

// TODO if record does not exist exit here..
        $ps_acl_update = Ps_acl::find($id);
// dynamic generation
        $ps_acl_update->name = request('name');
        $ps_acl_update->uid = request('uid');
        $ps_acl_update->gid = request('gid');
        $ps_acl_update->comments = request('comments');
        $ps_acl_update->del_stat = request('del_stat');

        $ps_acl_update->save();
        session()->flash('message', ' Thank you. Document updated ');
        session()->flash('type', 'success'); // OPTIONS bs-class : info|success|danger|warning
        return redirect('/ps_acl\/?'); // change your location here.. note a slash scape is required here
    }
// class close
}
?>