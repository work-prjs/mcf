<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGroupInMailAPIRequest;
use App\Http\Requests\API\UpdateGroupInMailAPIRequest;
use App\Models\GroupInMail;
use App\Repositories\GroupInMailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GroupInMailController
 * @package App\Http\Controllers\API
 */

class GroupInMailAPIController extends AppBaseController
{
    /** @var  GroupInMailRepository */
    private $groupInMailRepository;

    public function __construct(GroupInMailRepository $groupInMailRepo)
    {
        $this->groupInMailRepository = $groupInMailRepo;
    }

    /**
     * Display a listing of the GroupInMail.
     * GET|HEAD /groupInMails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $groupInMails = $this->groupInMailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($groupInMails->toArray(), 'Group In Mails retrieved successfully');
    }

    /**
     * Store a newly created GroupInMail in storage.
     * POST /groupInMails
     *
     * @param CreateGroupInMailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGroupInMailAPIRequest $request)
    {
        $input = $request->all();

        $groupInMail = $this->groupInMailRepository->create($input);

        return $this->sendResponse($groupInMail->toArray(), 'Group In Mail успешно сохранен');
    }

    /**
     * Display the specified GroupInMail.
     * GET|HEAD /groupInMails/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var GroupInMail $groupInMail */
        $groupInMail = $this->groupInMailRepository->find($id);

        if (empty($groupInMail)) {
            return $this->sendError('Group In Mail not found');
        }

        return $this->sendResponse($groupInMail->toArray(), 'Group In Mail retrieved successfully');
    }

    /**
     * Update the specified GroupInMail in storage.
     * PUT/PATCH /groupInMails/{id}
     *
     * @param int $id
     * @param UpdateGroupInMailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGroupInMailAPIRequest $request)
    {
        $input = $request->all();

        /** @var GroupInMail $groupInMail */
        $groupInMail = $this->groupInMailRepository->find($id);

        if (empty($groupInMail)) {
            return $this->sendError('Group In Mail not found');
        }

        $groupInMail = $this->groupInMailRepository->update($input, $id);

        return $this->sendResponse($groupInMail->toArray(), 'GroupInMail updated successfully');
    }

    /**
     * Remove the specified GroupInMail from storage.
     * DELETE /groupInMails/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var GroupInMail $groupInMail */
        $groupInMail = $this->groupInMailRepository->find($id);

        if (empty($groupInMail)) {
            return $this->sendError('Group In Mail not found');
        }

        $groupInMail->delete();

        return $this->sendResponse($id, 'Group In Mail deleted successfully');
    }
}
