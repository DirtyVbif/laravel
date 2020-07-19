<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_statuses', function (Blueprint $table) {
            $table->tinyInteger('usid', true, true)
                ->primaryKey();

            $table->char('status', 12)
                ->unique();
        });

        DB::table('user_statuses')
            ->insert([
                ['usid' => 1, 'status' => 'anonymous'],
                ['usid' => 2, 'status' => 'user'],
                ['usid' => 3, 'status' => 'moderator'],
                ['usid' => 4, 'status' => 'admin']
            ]);

        DB::statement('ALTER TABLE `users`
            ADD COLUMN `usid` TINYINT UNSIGNED NOT NULL DEFAULT \'2\' AFTER `updated_at`,
            ADD INDEX `usid` (`usid`),
            ADD CONSTRAINT `fk_users_user_status_usid` FOREIGN KEY (`usid`) REFERENCES `user_statuses` (`usid`)
            ON UPDATE CASCADE ON DELETE CASCADE;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE `users`
            DROP COLUMN `usid`,
            DROP INDEX `usid`,
            DROP FOREIGN KEY `fk_users_user_status_usid`;');

        Schema::dropIfExists('user_statuses');
    }
}
