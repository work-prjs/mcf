<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductCommentRequest;
use App\Http\Requests\UpdateProductCommentRequest;
use App\Repositories\ProductCommentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// controller.stub


use Session;

class ProductCommentController extends AppBaseController
{
    /** @var  ProductCommentRepository */
    private $productCommentRepository;

    public function __construct(ProductCommentRepository $productCommentRepo)
    {
        $this->productCommentRepository = $productCommentRepo;
    }

    /**
     * Display a listing of the ProductComment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $productComments = $this->productCommentRepository->paginate(10);

        return view('product_comments.index')
            ->with('productComments', $productComments);
    }

    /**
     * Show the form for creating a new ProductComment.
     *
     * @return Response
     */
    public function create()
    {
        return view('product_comments.create');
    }

    /**
     * Store a newly created ProductComment in storage.
     *
     * @param CreateProductCommentRequest $request
     *
     * @return Response
     */
    public function store(CreateProductCommentRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/product_comments');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $productComment = $this->productCommentRepository->create($input);

        Flash::success('Product Comment успешно сохранен.');

        return redirect(route('productComments.index'));
    }

    /**
     * Display the specified ProductComment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productComment = $this->productCommentRepository->find($id);

        if (empty($productComment)) {
            Flash::error('Product Comment not found');

            return redirect(route('productComments.index'));
        }

        return view('product_comments.show')->with('productComment', $productComment);
    }

    /**
     * Show the form for editing the specified ProductComment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productComment = $this->productCommentRepository->find($id);

        if (empty($productComment)) {
            Flash::error('Product Comment не найдено');

            return redirect(route('productComments.index'));
        }

        return view('product_comments.edit')->with('productComment', $productComment);
    }

    /**
     * Update the specified ProductComment in storage.
     *
     * @param int $id
     * @param UpdateProductCommentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductCommentRequest $request)
    {
        $productComment = $this->productCommentRepository->find($id);

        if (empty($productComment)) {
            Flash::error('Product Comment не найдено');

            return redirect(route('productComments.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/product_comments');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $productComment = $this->productCommentRepository->update($input, $id);

        Flash::success('Product Comment обновили.');

        return redirect(route('productComments.index'));
    }

    /**
     * Remove the specified ProductComment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productComment = $this->productCommentRepository->find($id);

        if (empty($productComment)) {
            Flash::error('Product Comment не найден');

            return redirect(route('productComments.index'));
        }

        // TODO Удаляем файл
        if (isset($productComment['image'])) {
            // $input['image']=0;
            unlink( getcwd().$productComment['image'] );
        }

        $this->productCommentRepository->delete($id);

        Flash::success('Product Comment удалено.');

        return redirect(route('productComments.index'));
    }

    public function destroy_all()
    {
        \App\Models\ProductComment::truncate();
        Flash::success('Всё удалено!');
        return redirect(route('productComments.index'));
    // destroy_all

    }

    /**
     * Remove the specified SubsEmail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function import(CreateProductCommentRequest $request)
    {

        $input = $request->all();
        $arr1 = preg_split('/\s+/', $input['elist']);
        if (!isset($input['active'])) {
            $input['active']=0;
        }
        if (!isset($input['subs'])) {
            $input['subs']=0;
        }
        // 
        foreach ($arr1 as $email ) {
            // $NewsubsEmail = $this->productCommentRepository->create(['email'=> $email, 'active'=> $input['active'], 'subs'=>$input['subs'], 'group_email_id'=> $input['group_email_id'] ]);
            $this->productCommentRepository->create(['text'=> $email ]);
        }
        // return var_dump($arr1);
        return redirect(route('productComments.index'));
    }


    public function export(Request $request)
    {

    }

    public function post_comment(Request $request)
    {
        $input = $request->all();
        // dd($input);
        // $product = $input['product_id'];
        $this->productCommentRepository->create(['text'=> $input['text'], 'product_id'=>$input['product_id'] ]);
        return true;

    }

    // Route::post('/productComments/post_comment', 'ProductCommentController@post_comment');

}
