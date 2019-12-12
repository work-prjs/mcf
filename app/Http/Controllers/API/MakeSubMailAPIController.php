<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMakeSubMailAPIRequest;
use App\Http\Requests\API\UpdateMakeSubMailAPIRequest;
use App\Models\MakeSubMail;
use App\Repositories\MakeSubMailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MakeSubMailController
 * @package App\Http\Controllers\API
 */

class MakeSubMailAPIController extends AppBaseController
{
    /** @var  MakeSubMailRepository */
    private $makeSubMailRepository;

    public function __construct(MakeSubMailRepository $makeSubMailRepo)
    {
        $this->makeSubMailRepository = $makeSubMailRepo;
    }

    /**
     * Display a listing of the MakeSubMail.
     * GET|HEAD /makeSubMails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $makeSubMails = $this->makeSubMailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($makeSubMails->toArray(), 'Make Sub Mails retrieved successfully');
    }

    /**
     * Store a newly created MakeSubMail in storage.
     * POST /makeSubMails
     *
     * @param CreateMakeSubMailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMakeSubMailAPIRequest $request)
    {
        $input = $request->all();

        $makeSubMail = $this->makeSubMailRepository->create($input);

        return $this->sendResponse($makeSubMail->toArray(), 'Make Sub Mail успешно сохранен');
    }

    /**
     * Display the specified MakeSubMail.
     * GET|HEAD /makeSubMails/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MakeSubMail $makeSubMail */
        $makeSubMail = $this->makeSubMailRepository->find($id);

        if (empty($makeSubMail)) {
            return $this->sendError('Make Sub Mail not found');
        }

        return $this->sendResponse($makeSubMail->toArray(), 'Make Sub Mail retrieved successfully');
    }

    /**
     * Update the specified MakeSubMail in storage.
     * PUT/PATCH /makeSubMails/{id}
     *
     * @param int $id
     * @param UpdateMakeSubMailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMakeSubMailAPIRequest $request)
    {
        $input = $request->all();

        /** @var MakeSubMail $makeSubMail */
        $makeSubMail = $this->makeSubMailRepository->find($id);

        if (empty($makeSubMail)) {
            return $this->sendError('Make Sub Mail not found');
        }

        $makeSubMail = $this->makeSubMailRepository->update($input, $id);

        return $this->sendResponse($makeSubMail->toArray(), 'MakeSubMail updated successfully');
    }

    /**
     * Remove the specified MakeSubMail from storage.
     * DELETE /makeSubMails/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MakeSubMail $makeSubMail */
        $makeSubMail = $this->makeSubMailRepository->find($id);

        if (empty($makeSubMail)) {
            return $this->sendError('Make Sub Mail not found');
        }

        $makeSubMail->delete();

        return $this->sendResponse($id, 'Make Sub Mail deleted successfully');
    }
}
