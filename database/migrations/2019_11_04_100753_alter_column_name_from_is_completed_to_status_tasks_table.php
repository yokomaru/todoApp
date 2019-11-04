<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnNameFromIsCompletedToStatusTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // isCompleted -> status
            $table->renameColumn('isCompleted', 'status'); /* <-- 完了フラグ -> 状態管理に変更 */
            $table->dateTime('due_until')->default(DB::raw('CURRENT_TIMESTAMP'));; /* <-- 期日追加 */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
}
