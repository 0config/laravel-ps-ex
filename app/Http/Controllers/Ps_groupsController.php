<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Ps_group;

class Ps_groupsController extends Controller
{
    public function autoIns(Ps_group $ps_group)
    {
        $ins = Ps_group::create(['name' => '']);
        return redirect( '/ps_group/' . $ins->id . "/edit/"); // you redirect logic here..
    }

    public function edit(Ps_group $ps_group, $id) // for update
    { //        validation STARTS // working
        $this->validate(request(), [
            'name' => 'required|min:5',
        ]) ;

// TODO if record does not exist exit here..
        $ps_group_update = Ps_group::find($id);
// dynamic generation
        $ps_group_update->name = request('name');
        $ps_group_update->del_stat = request('del_stat');
        $ps_group_update->comments = request('comments');

        $ps_group_update->save();
        session()->flash('message', ' Thank you. Document updated ');
        session()->flash('type', 'success'); // OPTIONS bs-class : info|success|danger|warning
        return redirect('/ps_group\/?'); // change your location here.. note a slash scape is required here
    }
// class close
}
?>