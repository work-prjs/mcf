<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Repositories\ArticleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// controller.stub

use \Spatie\DbDumper\Databases\MySql;

class ArticleController extends AppBaseController
{
    /** @var  ArticleRepository */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepository = $articleRepo;
    }

    /**
     * Display a listing of the Article.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $articles = $this->articleRepository->paginate(10);

        return view('articles.index')
            ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new Article.
     *
     * @return Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created Article in storage.
     *
     * @param CreateArticleRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/articles');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $article = $this->articleRepository->create($input);

        Flash::success('Article успешно сохранен.');

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified Article.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified Article.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error('Article не найдено');

            return redirect(route('articles.index'));
        }

        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified Article in storage.
     *
     * @param int $id
     * @param UpdateArticleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticleRequest $request)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error('Article не найдено');

            return redirect(route('articles.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/articles');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $article = $this->articleRepository->update($input, $id);

        Flash::success('Article обновили.');

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified Article from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error('Article не найден');

            return redirect(route('articles.index'));
        }

        // TODO Удаляем файл
        if (isset($article['image'])) {
            // $input['image']=0;
            unlink( getcwd().$article['image'] );
        }

        $this->articleRepository->delete($id);

        Flash::success('Article удалено.');

        return redirect(route('articles.index'));
    }

    public function destroy_all()
    {
        \App\Models\Article::truncate();
        Flash::success('Всё удалено!');
        return redirect(route('articles.index'));
    // destroy_all

    }

    /**
     * Remove the specified SubsEmail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function import(CreateArticleRequest $request)
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
            // $NewsubsEmail = $this->articleRepository->create(['email'=> $email, 'active'=> $input['active'], 'subs'=>$input['subs'], 'group_email_id'=> $input['group_email_id'] ]);
            $this->articleRepository->create(['name'=> $email ]);
        }
        // return var_dump($arr1);

        if ($request->hasFile('ifile')) {
            $path = $request->file('ifile')->store('public/articles');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }


        // if($request->hasfile('ifile'))
        //  {

        //     foreach($request->file('ifile') as $file)
        //     {
        //         dd(public_path());
        //         $name=$file->getClientOriginalName();
        //         $file->move(public_path().'/import/', $name);  
        //         // $data = $name;
        //     }
        //  }

        return redirect(route('articles.index'));
    }


    public function export(Request $request)
    {

        MySql::create()
            ->setDbName('blog1')
            ->setUserName('root')
            ->setPassword('mysqlpassword')
            // ->includeTables(['articles'])
            ->dumpToFile('articles_dump.sql');

    }

}
