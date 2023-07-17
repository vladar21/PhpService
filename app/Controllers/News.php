<?php
namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class News extends Controller
{
    public function index()
    {
        $model = new NewsModel();

        $data = [
            'news'  => $model->getNews(),
            'title' => 'All pages',
        ];

        echo view('news/header', $data);
        echo view('news/overview', $data);
        echo view('news/footer');
    }

    public function page($slug = NULL)
    {
        $model = new NewsModel();

        $page = $model->getNews($slug);

        if ($page)
        {
            $data['title'] = $page['title'];
            $data['page'] = $page;
        }
        else
        {
            $data['title'] = 'Page not found';
            $data['page']['title'] = 'Page not found';
            $data['page']['body'] = '404...';
        }

        echo view('news/header', $data);
        echo view('news/page', $data);
        echo view('news/footer');
    }
}