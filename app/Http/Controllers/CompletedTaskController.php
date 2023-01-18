<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Task as TaskModel;
use App\Models\CompletedTask as CompletedTaskModel;


class CompletedTaskController extends Controller
{
    /**
     * 一覧用の Illuminate\Database\Eloquent\Builder インスタンスの取得
     */
    protected function getListBuilder()
    {
        return TaskModel::where('user_id', Auth::id())
                     ->orderBy('priority', 'DESC')
                     ->orderBy('period')
                     ->orderBy('created_at');
    }
    /**
     * タスク一覧ページ を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function list()
    {
        //1Page辺りの表示アイテム数を設定
        $per_page=20;
        // 一覧の取得
        $list = $this->getListBuilder()
                     ->paginate($per_page);
                     
        /*$list = TaskModel::where('user_id', Auth::id())
                         ->orderBy('priority', 'DESC')
                         ->orderBy('period')
                         ->orderBy('created_at')
                         ->paginate($per_page);
                         //->get();
                         */
        
/*
$sql = TaskModel::where('user_id', Auth::id())
                 ->orderBy('priority', 'DESC')
                 ->orderBy('period')
                 ->orderBy('created_at')
                 ->toSql();
//echo "<pre>\n"; var_dump($sql, $list); exit;
var_dump($sql);
*/
        //
        return view('task.completed_list', ['list' => $list]);
    }
}