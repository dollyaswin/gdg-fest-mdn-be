<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	// Insert some books
        DB::table('book')->insert([
            'title'  => 'Deep Work: Rules for Focused Success in a Distracted World',
            'isbn'   => '1455586692',
            'author' => 'Cal Newport',
            'publisher'  => 'Grand Central Publishing; 1st edition (January 5, 2016)',
	    'created_at' => date('Y-m-d H:i:s', strtotime('now'))
	]);
        DB::table('book')->insert([
            'title'  => 'ONE Thing Surprisingly Extraordinary Results',
            'isbn'   => '9781885167774',
            'author' => 'Garry Keller, Jay Papasan',
            'publisher'  => 'Bard Press; 1st edition (April 1, 2013)',
	    'created_at' => date('Y-m-d H:i:s', strtotime('now'))
	]);
        DB::table('book')->insert([
            'title'  => 'Psychology of Money: Timeless lessons on wealth, greed, and happiness',
            'isbn'   => '0857197681',
            'author' => 'Morgan Housel',
            'publisher'  => 'Harriman House (September 8, 2020)',
	    'created_at' => date('Y-m-d H:i:s', strtotime('now'))
	]);
        DB::table('book')->insert([
            'title'  => 'Crushing It!: How Great Entrepreneurs Build Their Business and Influence-and How You Can, Too',
            'isbn'   => '0062674676',
            'author' => 'Gary Vaynerchuck',
            'publisher'  => 'Harper Business (January 30, 2018)',
	    'created_at' => date('Y-m-d H:i:s', strtotime('now'))
	]);
        DB::table('book')->insert([
            'title'  => 'Rework',
            'isbn'   => '0307463745',
            'author' => 'Jason Fried, David Heinemeier Hansson',
	    'publisher'  => 'Currency; 1st edition (March 9, 2010)',
	    'created_at' => date('Y-m-d H:i:s', strtotime('now'))
	]);
        DB::table('book')->insert([
            'title'  => 'Atomic Habits',
            'isbn'   => '0735211299',
            'author' => 'James Clear',
	    'publisher'  => 'Avery; Illustrated edition (October 16, 2018)',
	    'created_at' => date('Y-m-d H:i:s', strtotime('now'))
	]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $isbns = ['1455586692', '9781885167774', '0857197681', '0062674676', '0307463745', '0735211299'];
	foreach ($isbns as $isbn) {
            DB::table('book')->where('isbn', $isbn)->delete();
	}
    }
};
