<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupInMailRequest;
use App\Http\Requests\UpdateGroupInMailRequest;
use App\Repositories\GroupInMailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// controller.stub

class GroupInMailController extends AppBaseController
{
    /** @var  GroupInMailRepository */
    private $groupInMailRepository;

    public function __construct(GroupInMailRepository $groupInMailRepo)
    {
        $this->groupInMailRepository = $groupInMailRepo;
    }

    /**
     * Display a listing of the GroupInMail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $groupInMails = $this->groupInMailRepository->paginate(10);

        return view('group_in_mails.index')
            ->with('groupInMails', $groupInMails);
    }

    /**
     * Show the form for creating a new GroupInMail.
     *
     * @return Response
     */
    public function create()
    {
        return view('group_in_mails.create');
    }

    /**
     * Store a newly created GroupInMail in storage.
     *
     * @param CreateGroupInMailRequest $request
     *
     * @return Response
     */
    public function store(CreateGroupInMailRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/group_in_mails');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $groupInMail = $this->groupInMailRepository->create($input);

        Flash::success('Group In Mail успешно сохранен.');

        return redirect(route('groupInMails.index'));
    }

    /**
     * Display the specified GroupInMail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $groupInMail = $this->groupInMailRepository->find($id);

        if (empty($groupInMail)) {
            Flash::error('Group In Mail not found');

            return redirect(route('groupInMails.index'));
        }

        return view('group_in_mails.show')->with('groupInMail', $groupInMail);
    }

    /**
     * Show the form for editing the specified GroupInMail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $groupInMail = $this->groupInMailRepository->find($id);

        if (empty($groupInMail)) {
            Flash::error('Group In Mail not found');

            return redirect(route('groupInMails.index'));
        }

        return view('group_in_mails.edit')->with('groupInMail', $groupInMail);
    }

    /**
     * Update the specified GroupInMail in storage.
     *
     * @param int $id
     * @param UpdateGroupInMailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGroupInMailRequest $request)
    {
        $groupInMail = $this->groupInMailRepository->find($id);

        if (empty($groupInMail)) {
            Flash::error('Group In Mail not found');

            return redirect(route('groupInMails.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/group_in_mails');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $groupInMail = $this->groupInMailRepository->update($input, $id);

        Flash::success('Group In Mail updated successfully.');

        return redirect(route('groupInMails.index'));
    }

    /**
     * Remove the specified GroupInMail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $groupInMail = $this->groupInMailRepository->find($id);

        if (empty($groupInMail)) {
            Flash::error('Group In Mail not found');

            return redirect(route('groupInMails.index'));
        }

        // TODO Удаляем файл

        $this->groupInMailRepository->delete($id);

        Flash::success('Group In Mail deleted successfully.');

        return redirect(route('groupInMails.index'));
    }
}
