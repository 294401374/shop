<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ProductsController extends Controller
{
    use HasResourceActions;
    protected $title = '商品';

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('商品列表')
            // ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            // ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑商品')
            ->body($this->form()->edit($id));
    }

    public function update($id)
    {
        return $this->form()->update($id);
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('创建商品')
            ->body($this->form());
    }



    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product);

        $grid->id('ID');
        $grid->title('商品名称');
        // $grid->description('描述');
        $grid->price('价格');
        // $grid->img('Img');
        $grid->on_sale('已上架')->dispaly(function($value){
            return $value ? '是': '否';
        });
        $grid->sold_count('销量');
        $grid->review_count('评论数');
        $grid->rating('评分');
        // 不在每条数据后面展示查看和删除按钮
        $grid->actions(function($actions){
            $actions->disableView();
            $actions->disableDelete();
        });
        // 删除批量删除按钮
        $grid->tools(function($tools){
            $tools->batch(function($batch){
                $batch->disableDelete();
            });
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->description('Description');
        $show->price('Price');
        $show->img('Img');
        $show->on_sale('On sale');
        $show->sold_count('Sold count');
        $show->review_count('Review count');
        $show->rating('Rating');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product);

        $form->text('title', '名称')->rules('required');
        // $form->editor('description', '描述')->rules('required');
        // 这个价格是用的sku表的最低价格
        // $form->decimal('price', '价格');
        $form->image('img', '封面图')->rules('required|image');
        // 选择是否正在销售
        $form->radio('on_sale', '上架')->options(['1'=>'是','0'=>'否'])->default('0');

        $form->hasMany('skus', '商品SKU', function(Form\NestedForm $form){
            $form->text('title', 'SKU 名称')->rules('required');
            $form->text('description', 'SKU 描述')->rules('required');
            $form->text('stock', '库存')->rules('required|integer|min:0');
            $form->text('price', '单价')->rules('required|numeric|min:0.01');
        });
        // 定义获取最低值
        $form->saving(function(Form $form){
            // $form->model()->price = collect($form->input('skus'))->where(Form::REMOVE_FLAG_NAME, 0)->min('price') ?: 0;
            $form->model()->price = collect($form->input('skus'))->where(Form::REMOVE_FLAG_NAME, 0)->min('price')?:0;
        });

        return $form;
    }
}
