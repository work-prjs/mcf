<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubsGroupAPIRequest;
use App\Http\Requests\API\UpdateSubsGroupAPIRequest;
use App\Models\SubsGroup;
use App\Repositories\SubsGroupRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubsGroupController
 * @package App\Http\Controllers\API
 */

class SubsGroupAPIController extends AppBaseController
{
    /** @var  SubsGroupRepository */
    private $subsGroupRepository;

    public function __construct(SubsGroupRepository $subsGroupRepo)
    {
        $this->subsGroupRepository = $subsGroupRepo;
    }

    /**
     * Display a listing of the SubsGroup.
     * GET|HEAD /subsGroups
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $subsGroups = $this->subsGroupRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subsGroups->toArray(), 'Subs Groups retrieved successfully');
    }

    /**
     * Store a newly created SubsGroup in storage.
     * POST /subsGroups
     *
     * @param CreateSubsGroupAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSubsGroupAPIRequest $request)
    {
        $input = $request->all();

        $subsGroup = $this->subsGroupRepository->create($input);

        return $this->sendResponse($subsGroup->toArray(), 'Subs Group успешно сохранен');
    }

    /**
     * Display the specified SubsGroup.
     * GET|HEAD /subsGroups/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SubsGroup $subsGroup */
        $subsGroup = $this->subsGroupRepository->find($id);

        if (empty($subsGroup)) {
            return $this->sendError('Subs Group not found');
        }

        return $this->sendResponse($subsGroup->toArray(), 'Subs Group retrieved successfully');
    }

    /**
     * Update the specified SubsGroup in storage.
     * PUT/PATCH /subsGroups/{id}
     *
     * @param int $id
     * @param UpdateSubsGroupAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubsGroupAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubsGroup $subsGroup */
        $subsGroup = $this->subsGroupRepository->find($id);

        if (empty($subsGroup)) {
            return $this->sendError('Subs Group not found');
        }

        $subsGroup = $this->subsGroupRepository->update($input, $id);

        return $this->sendResponse($subsGroup->toArray(), 'SubsGroup updated successfully');
    }

    /**
     * Remove the specified SubsGroup from storage.
     * DELETE /subsGroups/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SubsGroup $subsGroup */
        $subsGroup = $this->subsGroupRepository->find($id);

        if (empty($subsGroup)) {
            return $this->sendError('Subs Group not found');
        }

        $subsGroup->delete();

        return $this->sendResponse($id, 'Subs Group deleted successfully');
    }
}
