<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemberFormRequest;
use App\Member;

class MemberController extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
                $members = Member::all();

                return view('members.index', compact('members'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
                return view('members.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(MemberFormRequest $request)
        {
                $member = Member::create($request->all());

                \Flash::success($member['name'].' was added to the database!');

                return redirect(route('members.index'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($memberId)
        {
            $member = Member::findOrFail($memberId);
            $member->password = '';
            
            return view('members.edit', compact('member'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(MemberFormRequest $request, $memberId)
        {
            $data = $request->except(['_method', '_token', 'password_confirmation']);

            if (empty($data['rip_runs'])) {
                $data['rip_runs'] = 0;
            }

            if (empty($data['notifications'])) {
                $data['notifications'] = 0;
            }

            Member::where('id', $memberId)->update($data);

            \Flash::success($request->get('name').' was updated.');

            return redirect(route('members.index'));
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($memberId)
        {
                //
        }
}
