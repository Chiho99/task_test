<?php

use App\Http\Controllers\ContactFormController;
use Illuminate\Database\Seeder;
use App\Models\ContactForm;
class ContactFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // 200個のダミーデータ
        factory(ContactForm::class, 200)->create();
    }
}
