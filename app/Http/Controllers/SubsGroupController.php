<?php

namespace App\Http\Controllers;

use App\DataTables\SubsGroupDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSubsGroupRequest;
use App\Http\Requests\UpdateSubsGroupRequest;
use App\Repositories\SubsGroupRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// datatable_controller.stub
// use Illuminate\Support\Facades\Redirect;
// use Illuminate\Http\Request;

class SubsGroupController extends AppBaseController
{
    /** @var  SubsGroupRepository */
    private $subsGroupRepository;

    public function __construct(SubsGroupRepository $subsGroupRepo)
    {
        $this->subsGroupRepository = $subsGroupRepo;
    }

    /**
     * Display a listing of the SubsGroup.
     *
     * @param SubsGroupDataTable $subsGroupDataTable
     * @return Response
     */
    public function index(SubsGroupDataTable $subsGroupDataTable)
    {
        return $subsGroupDataTable->render('subs_groups.index');
    }

    /**
     * Show the form for creating a new SubsGroup.
     *
     * @return Response
     */
    public function create()
    {
        return view('subs_groups.create');
    }

    /**
     * Store a newly created SubsGroup in storage.
     *
     * @param CreateSubsGroupRequest $request
     *
     * @return Response
     */
    public function store(CreateSubsGroupRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/subs_groups');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $subsGroup = $this->subsGroupRepository->create($input);

        Flash::success('Subs Group успешно сохранен.');

        return redirect(route('subsGroups.index'));
    }

    /**
     * Display the specified SubsGroup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subsGroup = $this->subsGroupRepository->find($id);

        if (empty($subsGroup)) {
            Flash::error('Subs Group not found');

            return redirect(route('subsGroups.index'));
        }
        // $emails = \App\Models\SubsEmail::where('group_email_id', $subsGroup->id)->get();
        $emails = $subsGroup->emails;
        return view('subs_groups.show')
                ->with('emails', $emails)
                ->with('subsGroup', $subsGroup);
    }


    /**
     * Show the form for editing the specified SubsGroup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subsGroup = $this->subsGroupRepository->find($id);

        if (empty($subsGroup)) {
            Flash::error('Subs Group not found');

            return redirect(route('subsGroups.index'));
        }

        return view('subs_groups.edit')->with('subsGroup', $subsGroup);
    }

    /**
     * Update the specified SubsGroup in storage.
     *
     * @param  int              $id
     * @param UpdateSubsGroupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubsGroupRequest $request)
    {
        $subsGroup = $this->subsGroupRepository->find($id);

        if (empty($subsGroup)) {
            Flash::error('Subs Group not found');

            return redirect(route('subsGroups.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/subs_groups');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $subsGroup = $this->subsGroupRepository->update($input, $id);

        Flash::success('Subs Group updated successfully.');

        return redirect(route('subsGroups.index'));
    }

    /**
     * Remove the specified SubsGroup from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subsGroup = $this->subsGroupRepository->find($id);

        if (empty($subsGroup)) {
            Flash::error('Subs Group not found');

            return redirect(route('subsGroups.index'));
        }

        // TODO Удаляем файл
        // unlink( getcwd().$subsGroup['image'] );

        $this->subsGroupRepository->delete($id);

        Flash::success('Subs Group deleted successfully.');

        return redirect(route('subsGroups.index'));
    }
}
