<?php

namespace App\Admin\Controllers;

use App\Models\CourseType;
use App\Models\Course;
use App\Models\User;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Tree;
use Encore\Admin\Layout\Content;

class CourseController extends AdminController
{

    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('token', __('Token'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('avatar', __('Avatar'));
        $grid->column('type', __('Type'));
        $grid->column('open_id', __('Open id'));
        $grid->column('access_token', __('Access token'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('phone', __('Phone'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('token', __('Token'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('avatar', __('Avatar'));
        $show->field('type', __('Type'));
        $show->field('open_id', __('Open id'));
        $show->field('access_token', __('Access token'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('phone', __('Phone'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }


    protected function form()
    {
        $form = new Form(new Course());
        $form->text('name', __('Name'));
        //get our categories
        //key value pair
        //last one is the key

        $result = CourseType::pluck('title','id');
        //select method helps you select one of the options that
        //comes from result variable
        $form->select('type_id', __('Category'))->options($result);
        $form->image('thumbnail', __('Thumbnail'))->uniqueName();
        //file is used for video and other format like pdf/doc
        $form->file('video', __('Video'))->uniqueName();
       // $form->text('title', __('Title'));
        $form->text('description', __('Description'));
        //decimal method helps with retrieving float format 
        //from the database
        $form->decimal('price', __('Price'));
        $form->number('lesson_num', __('Lesson number'));
        $form->number('video_length', __('Video length'));
        //for the posting. who is posting
        $result = User::pluck('name', 'token');
        $form->select('user_token', __('Teacher'))->options($result);
        $form->display('created_at', __('Created at'));
        $form->display('updated_at', __('Updated at'));
        return $form;
    }
}
