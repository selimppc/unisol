<?php

class HrWorkWeekTable extends Seeder {

    public function run()
    {
        DB::table('hr_work_week')->delete();

        $items = array(
            array(16, 'january', 'sunday', 'full-day', 7,7),
            array(16, 'february', 'monday', 'half-day', 7,7),
            array(16, 'march', 'tuesday', 'not-working-day', 7,7),
            array(16, 'april', 'wednesday', 'weekend',7,7),
            array(16, 'may', 'thursday', 'holiday',7,7),
            array(16, 'june', 'sunday', 'vacation',7,7),
            array(16, 'july', 'monday', 'full-day',7,7),
            array(16, 'august', 'tuesday', 'half-day',7,7),
            array(16, 'september', 'wednesday', 'not-working-day',7,7),
            array(16, 'october', 'thursday', 'weekend',7,7),
            array(16, 'november', 'monday', 'holiday',7,7),
            array(16, 'december', 'wednesday', 'vacation',7,7),
        );

        foreach($items as $item) {
            HrWorkWeek::create(array(
                'year_id' => $item[0],
                'month' => $item[1],
                'day' => $item[2],
                'status' => $item[3],
                'created_by' => $item[4],
                'updated_by' => $item[5],
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
}