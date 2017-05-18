<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Ps_group;

class Ps_groupsController extends Controller
{
    public function autoIns(Ps_group $ps_group)
    {
        $ins = Ps_group::create(['name' => '']);
//        return redirect('/ps_group/' . $ins->id . "/edit/"); // you redirect logic here..
        return redirect()->route('ps_group.edit', ['id' => $ins->id]); // you redirect logic here..

    }

    public function master_list()
    {
        $ps_groups = Ps_group::orderBy('id', 'desc')->paginate(env('PAGINATION_SM'));// change your number here
        $ps_groups = $ps_groups->appends(Input::except('page'));
        return view('ps_group/ps_group_list', compact('ps_groups'));
    }

    public function detail(Ps_group $ps_group, $id)
    {
        $ps_group = Ps_group::find($id);
        return view('ps_group/ps_group_detail', compact('ps_group'));
    }


    public function edit( $id)
    {
        $ps_group = Ps_group::find($id);
        if (count($ps_group) < 1) { // later refine this and do the same for update..
            echo 'record not found ';
            exit;
        }
        return view('ps_group/ps_group_edit', compact('ps_group'));
    }


    public function edit_post(Ps_group $ps_group, $id) // for update
    { //        validation STARTS // working
        $this->validate(request(), [
            'name' => 'required|min:5',
        ]);

// TODO if record does not exist exit here..
        $ps_group_update = Ps_group::find($id);
// dynamic generation
        $ps_group_update->name = request('name');
        $ps_group_update->del_stat = request('del_stat');
        $ps_group_update->comments = request('comments');

        $ps_group_update->save();
        session()->flash('message', ' Thank you. Document updated ');
        session()->flash('type', 'success'); // OPTIONS bs-class : info|success|danger|warning
//        return redirect('/ps_group\/?'); // change your location here.. note a slash scape is required here
        return redirect()->route('ps_group.master_list'); // change your location here.. note a slash scape is required here

    }
// class close
}

?>