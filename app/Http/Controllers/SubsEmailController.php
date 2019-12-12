<?php

namespace App\Http\Controllers;

use App\DataTables\SubsEmailDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSubsEmailRequest;
use App\Http\Requests\UpdateSubsEmailRequest;
use App\Repositories\SubsEmailRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// datatable_controller.stub

use Illuminate\Http\Request;

class SubsEmailController extends AppBaseController
{
    /** @var  SubsEmailRepository */
    private $subsEmailRepository;

    public function __construct(SubsEmailRepository $subsEmailRepo)
    {
        $this->subsEmailRepository = $subsEmailRepo;
    }

    /**
     * Display a listing of the SubsEmail.
     *
     * @param SubsEmailDataTable $subsEmailDataTable
     * @return Response
     */
    public function index(SubsEmailDataTable $subsEmailDataTable)
    {
        return $subsEmailDataTable->render('subs_emails.index');
    }

    /**
     * Show the form for creating a new SubsEmail.
     *
     * @return Response
     */
    public function create()
    {
        return view('subs_emails.create');
    }

    /**
     * Store a newly created SubsEmail in storage.
     *
     * @param CreateSubsEmailRequest $request
     *
     * @return Response
     */
    public function store(CreateSubsEmailRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/subs_emails');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $subsEmail = $this->subsEmailRepository->create($input);

        Flash::success('Subs Email успешно сохранен.');

        return redirect(route('subsEmails.index'));
    }

    /**
     * Display the specified SubsEmail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subsEmail = $this->subsEmailRepository->find($id);

        if (empty($subsEmail)) {
            Flash::error('Subs Email not found');

            return redirect(route('subsEmails.index'));
        }

        return view('subs_emails.show')->with('subsEmail', $subsEmail);
    }

    /**
     * Show the form for editing the specified SubsEmail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subsEmail = $this->subsEmailRepository->find($id);

        if (empty($subsEmail)) {
            Flash::error('Subs Email not found');

            return redirect(route('subsEmails.index'));
        }

        return view('subs_emails.edit')->with('subsEmail', $subsEmail);
    }

    /**
     * Update the specified SubsEmail in storage.
     *
     * @param  int              $id
     * @param UpdateSubsEmailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubsEmailRequest $request)
    {
        $subsEmail = $this->subsEmailRepository->find($id);

        if (empty($subsEmail)) {
            Flash::error('Subs Email not found');

            return redirect(route('subsEmails.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/subs_emails');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $subsEmail = $this->subsEmailRepository->update($input, $id);

        Flash::success('Subs Email updated successfully.');

        return redirect(route('subsEmails.index'));
    }

    /**
     * Remove the specified SubsEmail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subsEmail = $this->subsEmailRepository->find($id);

        if (empty($subsEmail)) {
            Flash::error('Subs Email not found');

            return redirect(route('subsEmails.index'));
        }

        // TODO Удаляем файл
        // unlink( getcwd().$subsEmail['image'] );

        $this->subsEmailRepository->delete($id);

        Flash::success('Subs Email deleted successfully.');

        return redirect(route('subsEmails.index'));
    }


    /**
     * Remove the specified SubsEmail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function import(CreateSubsEmailRequest $request)
    {

        $input = $request->all();
        $arr1 = explode(" ", $input['elist']);
        if (!isset($input['active'])) {
            $input['active']=0;
        }
        if (!isset($input['subs'])) {
            $input['subs']=0;
        }
        // 
        foreach ($arr1 as $email ) {
            $NewsubsEmail = $this->subsEmailRepository->create(['email'=> $email, 'active'=> $input['active'], 'subs'=>$input['subs'], 'group_email_id'=> $input['group_email_id'] ]);
        }
        // return var_dump($arr1);
        return redirect(route('subsEmails.index'));
    }

}
