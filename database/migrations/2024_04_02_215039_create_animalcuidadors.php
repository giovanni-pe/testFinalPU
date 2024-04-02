<?php 
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//Generated By PlantUML Command
class CreateAnimalcuidadors extends Migration{
	public function up(){ 
 		Schema::create('animalcuidadors', function (Blueprint $table) { 
			$table->bigIncrements('id');
			$table->integer('animal_id');
			$table->integer('cuidador_id');
			$table->timestamps();
		});
 	} 
	public function down(){
 
	} 
}