<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMakeSubMailRequest;
use App\Http\Requests\UpdateMakeSubMailRequest;
use App\Repositories\MakeSubMailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// controller.stub

use Illuminate\Support\Facades\Redirect;
// use Illuminate\Http\Request;

class MakeSubMailController extends AppBaseController
{
    /** @var  MakeSubMailRepository */
    private $makeSubMailRepository;

    public function __construct(MakeSubMailRepository $makeSubMailRepo)
    {
        $this->makeSubMailRepository = $makeSubMailRepo;
    }

    /**
     * Display a listing of the MakeSubMail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $makeSubMails = $this->makeSubMailRepository->paginate(10);

        return view('make_sub_mails.index')
            ->with('makeSubMails', $makeSubMails);
    }

    /**
     * Show the form for creating a new MakeSubMail.
     *
     * @return Response
     */
    public function create()
    {
        return view('make_sub_mails.create');
    }

    /**
     * Store a newly created MakeSubMail in storage.
     *
     * @param CreateMakeSubMailRequest $request
     *
     * @return Response
     */
    public function store(CreateMakeSubMailRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/make_sub_mails');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $makeSubMail = $this->makeSubMailRepository->create($input);

        Flash::success('Make Sub Mail успешно сохранен.');

        return redirect(route('makeSubMails.index'));
    }

    /**
     * Display the specified MakeSubMail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $makeSubMail = $this->makeSubMailRepository->find($id);

        if (empty($makeSubMail)) {
            Flash::error('Make Sub Mail not found');

            return redirect(route('makeSubMails.index'));
        }
        // $groups = \App\Models\GroupInMail::where('make_sub_mail_id', $makeSubMail->id)->where('subs_group_id', $makeSubMail->id)->get();
    
        $groups = $makeSubMail->group_in_mails;

        // $groups = \App\Models\GroupInMail::where('make_sub_mail_id', $makeSubMail->id)->get();
        // $groups = \App\Models\GroupInMail::where('make_sub_mail_id', $makeSubMail->id)->get();

        // foreach ($groups as $i1 ) {
        //     $i1->subs_group_id
        //     // $NewsubsEmail = $this->subsEmailRepository->create(['email'=> $email, 'active'=> $input['active'], 'subs'=>$input['subs'],  ]);
        // }

        // subs_group_id

        // dd($groups);

        // $userRecord = self::where('email', $email)->where('password', $password)->first();

        // $groups = \App\Models\SubsGroup::all();

        // Schema::create('group_in_mails', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('make_sub_mail_id');
        //     $table->integer('subs_group_id');


        return view('make_sub_mails.show')
                ->with('groups', $groups)
                ->with('makeSubMail', $makeSubMail);



    }

    public function add_group($id, $group_id)
    {
        // Route::get('/subsGroups/{$id}/add_group/{$group_id}', 'SubsGroupController@add_group');
        // $makeSubMail = $this->makeSubMailRepository->find($id);


        $groups1 = \App\Models\GroupInMail::create(['make_sub_mail_id'=>$id, 'subs_group_id'=> $group_id]);

        // $makeSubMail->id

        // $groups = \App\Models\GroupInMail::where('make_sub_mail_id', $makeSubMail->id)->where('subs_group_id', $makeSubMail->id)->get();
    
        // $groups = $makeSubMail->group_in_mails;

        // $groups = \App\Models\GroupInMail::where('make_sub_mail_id', $makeSubMail->id)->get();
        // $groups = \App\Models\GroupInMail::where('make_sub_mail_id', $makeSubMail->id)->get();

        // foreach ($groups as $i1 ) {
        //     $i1->subs_group_id
        //     // $NewsubsEmail = $this->subsEmailRepository->create(['email'=> $email, 'active'=> $input['active'], 'subs'=>$input['subs'],  ]);
        // }

        // subs_group_id

        // dd($groups);

        // $userRecord = self::where('email', $email)->where('password', $password)->first();

        // $groups = \App\Models\SubsGroup::all();

        // Schema::create('group_in_mails', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('make_sub_mail_id');
        //     $table->integer('subs_group_id');



        return Redirect::back();


    }


    /**
     * Show the form for editing the specified MakeSubMail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $makeSubMail = $this->makeSubMailRepository->find($id);

        if (empty($makeSubMail)) {
            Flash::error('Make Sub Mail not found');

            return redirect(route('makeSubMails.index'));
        }

        return view('make_sub_mails.edit')->with('makeSubMail', $makeSubMail);
    }

    /**
     * Update the specified MakeSubMail in storage.
     *
     * @param int $id
     * @param UpdateMakeSubMailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMakeSubMailRequest $request)
    {
        $makeSubMail = $this->makeSubMailRepository->find($id);

        if (empty($makeSubMail)) {
            Flash::error('Make Sub Mail not found');

            return redirect(route('makeSubMails.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/make_sub_mails');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $makeSubMail = $this->makeSubMailRepository->update($input, $id);

        Flash::success('Make Sub Mail updated successfully.');

        return redirect(route('makeSubMails.index'));
    }

    /**
     * Remove the specified MakeSubMail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $makeSubMail = $this->makeSubMailRepository->find($id);

        if (empty($makeSubMail)) {
            Flash::error('Make Sub Mail not found');

            return redirect(route('makeSubMails.index'));
        }

        // TODO Удаляем файл

        $this->makeSubMailRepository->delete($id);

        Flash::success('Make Sub Mail deleted successfully.');

        return redirect(route('makeSubMails.index'));
    }
}
