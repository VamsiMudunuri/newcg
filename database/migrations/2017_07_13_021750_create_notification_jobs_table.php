<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationJobsTable extends Migration
{

    protected $connection;
    private $table = 'notification_jobs';

    public function __construct() {
        $this->connection = Config::get('database.connections.mongodb.driver');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::connection($this->connection)->create($this->table, function (Blueprint $table) {

            $table->index(['model' => 1, 'model_id' => -1]);
            $table->index('status');
            $table->index('last_user_id');
            $table->index('last_models');
            $table->index(['creator' => 1, 'editor' => -1]);
            $table->index(['created_at' => 1]);
            $table->index(['updated_at' => 1]);

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::connection($this->connection)->drop($this->table);
    }

}
