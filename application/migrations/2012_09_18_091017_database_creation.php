<?php

class Database_Creation {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create Users Table
		Schema::create('users', function($table)
    {
        $table->increments('id');
        $table->string('username',25)->unique();
        $table->string('password',60);
        $table->string('email')->unique();
        $table->string('first_name',50);
        $table->string('last_name',50);
        $table->date('last_login');
        $table->timestamps();
    });
    
    // Create Pages Table
    Schema::create('pages', function($table)
    {
        $table->increments('id');
        $table->string('slug')->unique();
        $table->string('title');
        $table->text('markdown');
        $table->integer('parent_id');
        $table->integer('order')->default(0);
        $table->integer('user_id');
        $table->timestamps();
    });
    
    // Create Aliases Table
    Schema::create('aliases', function($table)
    {
        $table->increments('id');
        $table->string('alias');
        $table->integer('page_id');
        $table->string('slug');
        $table->timestamps();
    });
    
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
    Schema::drop('pages');
    Schema::drop('aliases');
	}

}