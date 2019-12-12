<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubsEmailAPIRequest;
use App\Http\Requests\API\UpdateSubsEmailAPIRequest;
use App\Models\SubsEmail;
use App\Repositories\SubsEmailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubsEmailController
 * @package App\Http\Controllers\API
 */

class SubsEmailAPIController extends AppBaseController
{
    /** @var  SubsEmailRepository */
    private $subsEmailRepository;

    public function __construct(SubsEmailRepository $subsEmailRepo)
    {
        $this->subsEmailRepository = $subsEmailRepo;
    }

    /**
     * Display a listing of the SubsEmail.
     * GET|HEAD /subsEmails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $subsEmails = $this->subsEmailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subsEmails->toArray(), 'Subs Emails retrieved successfully');
    }

    /**
     * Store a newly created SubsEmail in storage.
     * POST /subsEmails
     *
     * @param CreateSubsEmailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSubsEmailAPIRequest $request)
    {
        $input = $request->all();

        $subsEmail = $this->subsEmailRepository->create($input);

        return $this->sendResponse($subsEmail->toArray(), 'Subs Email успешно сохранен');
    }

    /**
     * Display the specified SubsEmail.
     * GET|HEAD /subsEmails/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SubsEmail $subsEmail */
        $subsEmail = $this->subsEmailRepository->find($id);

        if (empty($subsEmail)) {
            return $this->sendError('Subs Email not found');
        }

        return $this->sendResponse($subsEmail->toArray(), 'Subs Email retrieved successfully');
    }

    /**
     * Update the specified SubsEmail in storage.
     * PUT/PATCH /subsEmails/{id}
     *
     * @param int $id
     * @param UpdateSubsEmailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubsEmailAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubsEmail $subsEmail */
        $subsEmail = $this->subsEmailRepository->find($id);

        if (empty($subsEmail)) {
            return $this->sendError('Subs Email not found');
        }

        $subsEmail = $this->subsEmailRepository->update($input, $id);

        return $this->sendResponse($subsEmail->toArray(), 'SubsEmail updated successfully');
    }

    /**
     * Remove the specified SubsEmail from storage.
     * DELETE /subsEmails/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SubsEmail $subsEmail */
        $subsEmail = $this->subsEmailRepository->find($id);

        if (empty($subsEmail)) {
            return $this->sendError('Subs Email not found');
        }

        $subsEmail->delete();

        return $this->sendResponse($id, 'Subs Email deleted successfully');
    }
}
