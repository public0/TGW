<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('question_type_id')->unsigned();
			$table->TEXT('question');
			$table->string('question_image', 100)->default(''); 
			$table->text('code')->nullable();
			$table->integer('priority')->unsigned()->default(1);
			$table->integer('points')->unsigned();
			$table->string('header_text', 256)->default('');
			$table->string('footer_text', 256)->default('');

			$table->timestamps();
		});

		DB::table('questions')->insert(
		        array(
		        	'id' => 1,
		            'question_type_id' => 2,
		            'question' => 'Modificarile aduse unui document (procedura, specificatie, etc) sunt gestionate prin:',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 2,
		            'question_type_id' => 2,
		            'question' => 'Cand solicita emitentul un Numar de Control Document pentru a codifica intern un document (procedura, specificatie, etc.):',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 3,
		            'question_type_id' => 2,
		            'question' => 'In functie de continut, emitentul care incepe sa scrie un document (procedura, specificatie, etc.) il va eticheta cu una din etichetele urmatoare:',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 4,
		            'question_type_id' => 2,
		            'question' => 'Cum trebuie tratate documentele intocmite pentru licitatii, cunoscand ca acestea nu pot fi etichetate:',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 5,
		            'question_type_id' => 2,
		            'question' => 'Personalul contractual este solicitat sa semneze un Non-Disclosure Agreement la angajare, prin care se obliga sa:',
		            'priority' => 1,
		            'points' => 10,
		            'code' => '',
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 6,
		            'question_type_id' => 2,
		            'question' => 'La ce se refera standardul ISO/IEC 27001:',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'code' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 7,
		            'question_type_id' => 2,
		            'question' => 'Toate creatiile intelectuale de orice natura ale angajatilor, inclusiv programele informatice, create pe perioada activitatii si in legatura cu aceasta, sunt protejate de lege si apartin de drept:',
		            'priority' => 1,
		            'points' => 10,
		            'code' => '',
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 8,
		            'question_type_id' => 2,
		            'question' => 'Identificarea aparitiei unei stari a sistemului, serviciului sau retelei informatice care indica o posibila incalcare a politicilor de securitatea informatiilor este considerata:',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'code' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 9,
		            'question_type_id' => 2,
		            'question' => 'Unul sau o serie de evenimente de securitatea informatiilor nedorite sau neasteptate, care au o probabilitate semnificativa de a compromite operatiunile de afaceri si de a pune in pericol securitatea informatiilor reprezinta:',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 10,
		            'question_type_id' => 2,
		            'question' => 'Cui trebuie raportat un Incident de Securitate:',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		/**
		* PHP Questions
		*/
		DB::table('questions')->insert(
		        array(
		        	'id' => 11,
		            'question_type_id' => 2,
		            'question' => 'What will be printed by the below code ?',
		            'code' => '$a = 1;
{
  $a = 2;
}
 
echo $a, "\n";		            
		            ',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 12,
		            'question_type_id' => 2,
		            'question' => 'A value that has no defined value is expressed in PHP with the following keyword:',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 13,
		            'question_type_id' => 2,
		            'question' => 'Which statement about the code below is correct?',
		            'code' => 'class A {}

class B {}

class C extends A, B {}		            
		            ',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 14,
		            'question_type_id' => 2,
		            'question' => 'What will be the output of the following PHP code ?',
		            'code' => '
$color1 = "red";
$color2 = "green";
echo "$color1" + "$color2";		            
		            ',
		            'priority' => 2,
		            'points' => 13,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 15,
		            'question_type_id' => 2,
		            'question' => 'What will be the output of the following PHP code ?',
		            'code' => '$user = array("Ashley", "Bale", "Shrek", "Blank");
for ($x=0; $x < count($user); $x++)	{
    if ($user[$x] == "Shrek") continue;
        printf ($user[$x]); 
}		            	
		            ',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 16,
		            'question_type_id' => 2,
		            'question' => 'What is the value of $a and $b after the function call ?',
		            'code' => 'function doSomething( &$arg ) {
    $return = $arg;
    $arg += 1;
    return $return;	
}
$a = 3;
$b = doSomething( $a );		            
		            ',
		            'priority' => 2,
		            'points' => 13,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 17,
		            'question_type_id' => 1,
		            'question' => 'What is true regarding $a + $b where both of them are arrays?',
		            'priority' => 2,
		            'points' => 15,
		            'code' => '',
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 18,
		            'question_type_id' => 2,
		            'question' => 'What is the error in the following declaration of a static class method?',
		            'code' => 'class car { 
	static $speeds = array( \'fast\', \'slow\', \'medium\', );  
	static function getSpeeds() { 
		return $this->speeds; 
	} 
}',
		            'priority' => 2,
		            'points' => 13,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 19,
		            'question_type_id' => 1,
		            'question' => 'Which of the following are valid identifiers?',
		            'code' => '',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 20,
		            'question_type_id' => 2,
		            'question' => 'What does the function return',
		            'code' => 'function byRef(&$number) {
$number *= 10;
return ($number - 5);
}
$number = 10;
byRef($number);
echo $number;
		            ',
		            'priority' => 2,
		            'points' => 13,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		/* 10 - 20 */
		DB::table('questions')->insert(
		        array(
		        	'id' => 21,
		            'question_type_id' => 2,
		            'question' => 'Which one of the following methods is invoked when a value is assigned to an undefined property ?',
		            'priority' => 2,
		            'code' => '',
		            'points' => 14,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );


		DB::table('questions')->insert(
		        array(
		        	'id' => 22,
		            'question_type_id' => 2,
		            'question' => 'What will be the output of the following PHP code ?',
		            'code' => 'class Person 
{
    function getName() { return "Bob"; }
    function getAge() { return 44; }
    function __toString() {
        $desc = $this->getName();
        $desc .= " (age ".$this->getAge().")";
        return $desc;
    }
}
$person = new Person();
print $person;		            
		            ',
		            'priority' => 2,
		            'points' => 13,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 23,
		            'question_type_id' => 2,
		            'question' => 'What will be the output of the following PHP code ?',
		            'code' => 'class Checkout {
    final function totalize() {
        // calculate bill
    }
}
 
class IllegalCheckout extends Checkout {
    final function totalize() {
        // change bill calculation
    }
}
		            ',
		            'priority' => 3,
		            'points' => 15,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 24,
		            'question_type_id' => 2,
		            'question' => 'Which of the following can you place inside a namespace ?',
		            'code' => '
i) classes
ii) functions
iii) variables		            
		            ',
		            'priority' => 3,
		            'points' => 15,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 25,
		            'question_type_id' => 2,
		            'question' => 'Which function is used to split a string into a series of substrings, with each string boundary is determined by a specific separator ?',
		            'priority' => 2,
		            'code' => '',
		            'points' => 14,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 26,
		            'question_type_id' => 2,
		            'question' => 'Which one of the following functions is capable of reading a file into an array ?',
		            'priority' => 2,
		            'code' => '',
		            'points' => 13,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 27,
		            'question_type_id' => 2,
		            'question' => 'Which one of the following function is capable of reading a file into a string variable ?',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 28,
		            'question_type_id' => 2,
		            'question' => 'Which one of the following functions is capable of reading a specific number of characters from a file ?',
		            'priority' => 2,
		            'code' => '',
		            'points' => 13,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 29,
		            'question_type_id' => 2,
		            'question' => 'Which keyword is used to declare a constant property ?',
		            'priority' => 2,
		            'points' => 12,
		            'code' => '',
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 30,
		            'question_type_id' => 2,
		            'question' => 'How many of the following can be contained in constants ?',
		            'priority' => 2,
		            'code' => '',
		            'points' => 14,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		/**
		* End PHP
		*/

		/**
		* MySQL Test
		*/
		DB::table('questions')->insert(
		        array(
		        	'id' => 31,
		            'question_type_id' => 3,
		            'question' => 'In the example below, assign the employee_id column the alias of “Number.” Complete the SQL statement to order the result set by the column alias.',
		            'code' => 'SELECT employee_id, first_name, last_name FROM employees;',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 32,
		            'question_type_id' => 2,
		            'question' => 'Limiting values with the WHERE clause is an example of:',
		            'priority' => 1,
		            'points' => 10,
		            'code' => '',
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 33,
		            'question_type_id' => 3,
		            'question' => 'What are the objects that can be created using CREATE statement ?',
		            'code' => '',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 34,
		            'question_type_id' => 2,
		            'question' => 'You want to sort your CD collection by title, and then by artist. This can be accomplished using:',
		            'code' => '',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 35,
		            'question_type_id' => 1,
		            'question' => 'Which of the following are SQL keywords?',
		            'priority' => 1,
		            'points' => 10,
		            'code' => '',
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 36,
		            'question_type_id' => 3,
		            'question' => 'The following query was supposed to return the CD title “Carpe Diem" but no rows were returned. Correct the mistake in the statement and show the output.',
		            'code' => 'SELECT produce, title FROM d_cds WHERE title = \'carpe diem\' ;',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 37,
		            'question_type_id' => 2,
		            'question' => 'Which values will be selected in the following query?',
		            'code' => 'SELECT salary FROM employees WHERE salary < 5000;',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 38,
		            'question_type_id' => 2,
		            'question' => 'What will be the output of the following statement?',
		            'code' => 'SELECT LENGTH(CAST(LEFT(\'026-100\', 3) AS UNSIGNED)) LENGTH',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 39,
		            'question_type_id' => 2,
		            'question' => 'What will be the output of the following statement?',
		            'code' => 'SELECT ROUND(123.89, -1)',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 40,
		            'question_type_id' => 3,
		            'question' => 'What is the difference between CHAR_LENGTH and LENGTH ?',
		            'code' => '',
		            'priority' => 1, 
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 41,
		            'question_type_id' => 2,
		            'question' => 'Can the SELECT clause list have a computed value like in the example below?',
		            'code' => 'SELECT CustomerName, UnitPrice * NumberofUnits FROM Sales',
		            'priority' => 1,
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 42,
		            'question_type_id' => 3,
		            'question' => 'What is the usage of ENUMs in MySQL? Give example.',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 43,
		            'question_type_id' => 2,
		            'question' => 'A trigger belongs to…',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 44,
		            'question_type_id' => 2,
		            'question' => 'The NULL SQL keyword is used to ...',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 45,
		            'question_type_id' => 3,
		            'question' => 'What happens when the column is set to AUTO INCREMENT and if you reach maximum value in the table ?',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 46,
		            'question_type_id' => 3,
		            'question' => 'What is the difference between NOW() and CURRENT_DATE()?',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('questions')->insert(
		        array(
		        	'id' => 47,
		            'question_type_id' => 3,
		            'question' => 'To what events can you attach a TRIGGER ?',
		            'priority' => 1,
		            'code' => '',
		            'points' => 10,
		            'header_text' => '',
		            'footer_text' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		/**
		* MySQL END
		*/

		echo "Done inserting questions.\n";
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questions');
	}

}
