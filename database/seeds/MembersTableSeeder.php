<?php

use Illuminate\Database\Seeder;

use \Carbon\Carbon;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->demo() as $key => $row) {
            DB::table('members')->insert([
                'family_id' => 1,
                'name' => $row['name'],
                'local_name' => $row['local_name']??null,
                'dob' => $row['dob']??Carbon::now(),
                'chinese_zodiac' => $row['chinese_zodiac']??null,
            ]);
        }

        $this->demo_relationship();
    }

    protected function demo()
    {
        return [
            ['name'=>'Grand Father','local_name'=>'公公','dob'=>'1900-01-01','chinese_zodiac'=>''],
            ['name'=>'Grand Mother','local_name'=>'婆婆','dob'=>'1902-01-01','chinese_zodiac'=>''],
            ['name'=>'Father','local_name'=>'父亲','dob'=>'1930-01-01','chinese_zodiac'=>''],
            ['name'=>'Mother','local_name'=>'母亲','dob'=>'1931-01-01','chinese_zodiac'=>''],
            ['name'=>'Uncle','local_name'=>'叔叔','dob'=>'1929-01-01','chinese_zodiac'=>''],
            ['name'=>'Aunt','local_name'=>'姑姑','dob'=>'1933-01-01','chinese_zodiac'=>''],
            ['name'=>'Me','local_name'=>'我','dob'=>'1950-01-01','chinese_zodiac'=>''],
            ['name'=>'Brother','local_name'=>'哥哥','dob'=>'1951-01-01','chinese_zodiac'=>''],
            ['name'=>'Sister','local_name'=>'妹妹','dob'=>'1951-01-01','chinese_zodiac'=>''],
            ['name'=>'Niece','local_name'=>'侄女','dob'=>'1951-01-01','chinese_zodiac'=>''],
            ['name'=>'Nephew','local_name'=>'侄儿','dob'=>'1951-01-01','chinese_zodiac'=>''],
            ['name'=>'Cousin','local_name'=>'表哥','dob'=>'1951-01-01','chinese_zodiac'=>''],
            ['name'=>'Brother-In-Law','local_name'=>'妹夫','dob'=>'1951-01-01','chinese_zodiac'=>''],
            ['name'=>'Sister-In-Law','local_name'=>'嫂嫂','dob'=>'1951-01-01','chinese_zodiac'=>''],
        ];   
    }
    protected function demo_relationship()
    {
        DB::table('relation')->insert([
            'member_id' => \App\Member::where('name','Grand Mother')->first()->id,
            'parent_id' => \App\Member::where('name','Grand Father')->first()->id,
            'spouse' => 1,
        ]);
        DB::table('relation')->insert([
            'member_id' => \App\Member::where('name','Father')->first()->id,
            'parent_id' => \App\Member::where('name','Grand Father')->first()->id,
            'spouse' => 0,
        ]);
        DB::table('relation')->insert([
            'member_id' => \App\Member::where('name','Uncle')->first()->id,
            'parent_id' => \App\Member::where('name','Grand Father')->first()->id,
            'spouse' => 0,
        ]);
        DB::table('relation')->insert([
            'member_id' => \App\Member::where('name','Aunt')->first()->id,
            'parent_id' => \App\Member::where('name','Grand Father')->first()->id,
            'spouse' => 0,
        ]);
        DB::table('relation')->insert([
            'member_id' => \App\Member::where('name','Mother')->first()->id,
            'parent_id' => \App\Member::where('name','Father')->first()->id,
            'spouse' => 1,
        ]);
        DB::table('relation')->insert([
            'member_id' => \App\Member::where('name','Brother')->first()->id,
            'parent_id' => \App\Member::where('name','Father')->first()->id,
            'spouse' => 0,
        ]);
        DB::table('relation')->insert([
            'member_id' => \App\Member::where('name','Me')->first()->id,
            'parent_id' => \App\Member::where('name','Father')->first()->id,
            'spouse' => 0,
        ]);
        DB::table('relation')->insert([
            'member_id' => \App\Member::where('name','Sister')->first()->id,
            'parent_id' => \App\Member::where('name','Father')->first()->id,
            'spouse' => 0,
        ]);
        DB::table('relation')->insert([
            'member_id' => \App\Member::where('name','Cousin')->first()->id,
            'parent_id' => \App\Member::where('name','Uncle')->first()->id,
            'spouse' => 0,
        ]);
        DB::table('relation')->insert([
            'member_id' => \App\Member::where('name','Nephew')->first()->id,
            'parent_id' => \App\Member::where('name','Sister')->first()->id,
            'spouse' => 0,
        ]);
        DB::table('relation')->insert([
            'member_id' => \App\Member::where('name','Brother-In-Law')->first()->id,
            'parent_id' => \App\Member::where('name','Sister')->first()->id,
            'spouse' => 1,
        ]);
        DB::table('relation')->insert([
            'member_id' => \App\Member::where('name','Sister-In-Law')->first()->id,
            'parent_id' => \App\Member::where('name','Brother')->first()->id,
            'spouse' => 1,
        ]);
        DB::table('relation')->insert([
            'member_id' => \App\Member::where('name','Niece')->first()->id,
            'parent_id' => \App\Member::where('name','Brother')->first()->id,
            'spouse' => 0,
        ]);
    }
}
