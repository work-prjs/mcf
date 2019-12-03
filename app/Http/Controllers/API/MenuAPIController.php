<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMenuAPIRequest;
use App\Http\Requests\API\UpdateMenuAPIRequest;
use App\Models\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MenuController
 * @package App\Http\Controllers\API
 */

class MenuAPIController extends AppBaseController
{
    /** @var  MenuRepository */
    private $menuRepository;

    public function __construct(MenuRepository $menuRepo)
    {
        $this->menuRepository = $menuRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/menus",
     *      summary="Get a listing of the Menus.",
     *      tags={"Menu"},
     *      description="Get all Menus",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Menu")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $menus = $this->menuRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($menus->toArray(), 'Menus retrieved successfully');
    }

    /**
     * @param CreateMenuAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/menus",
     *      summary="Store a newly created Menu in storage",
     *      tags={"Menu"},
     *      description="Store Menu",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Menu that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Menu")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Menu"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMenuAPIRequest $request)
    {
        $input = $request->all();

        $menu = $this->menuRepository->create($input);

        return $this->sendResponse($menu->toArray(), 'Menu объект успешно сохранён.');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/menus/{id}",
     *      summary="Display the specified Menu",
     *      tags={"Menu"},
     *      description="Get Menu",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Menu",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Menu"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Menu $menu */
        $menu = $this->menuRepository->find($id);

        if (empty($menu)) {
            return $this->sendError('Menu объект не найден');
        }

        return $this->sendResponse($menu->toArray(), 'Menu retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMenuAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/menus/{id}",
     *      summary="Update the specified Menu in storage",
     *      tags={"Menu"},
     *      description="Update Menu",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Menu",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Menu that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Menu")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Menu"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMenuAPIRequest $request)
    {
        $input = $request->all();

        /** @var Menu $menu */
        $menu = $this->menuRepository->find($id);

        if (empty($menu)) {
            return $this->sendError('Menu объект не найден');
        }

        $menu = $this->menuRepository->update($input, $id);

        return $this->sendResponse($menu->toArray(), 'Menu обновлено успешно');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/menus/{id}",
     *      summary="Remove the specified Menu from storage",
     *      tags={"Menu"},
     *      description="Delete Menu",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Menu",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Menu $menu */
        $menu = $this->menuRepository->find($id);

        if (empty($menu)) {
            return $this->sendError('Menu объект не найден');
        }

        $menu->delete();

        return $this->sendResponse($id, 'Menu deleted successfully');
    }
}
