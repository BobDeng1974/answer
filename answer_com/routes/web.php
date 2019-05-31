<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('examList','Exam@examList');
Route::get('cheType','Exam@cheType');
Route::get('getOrder','Exam@getOrder');
Route::view('orders','order');

//��̨������·��
Route::get('question/questList',"QuestionController@questList");
//��Ⱦ������ҳ��
Route::get('question/addQuest',"QuestionController@addQuest");
//����������
Route::post('question/questAdd',"QuestionController@questAdd");
//��Ⱦ�޸�ҳ��
Route::get('question/updQuest',"QuestionController@updQuest");
//��Ⱦ�޸�����
Route::post('question/questUpd',"QuestionController@questUpd");
//ɾ��
Route::get('question/questDel',"QuestionController@questDel");
Route::post('question/upload',"QuestionController@upload");

Route::get('question/keche',"QuestionController@keche");
Route::get('question/huoche',"QuestionController@huoche");
Route::get('question/motuo',"QuestionController@motuo");