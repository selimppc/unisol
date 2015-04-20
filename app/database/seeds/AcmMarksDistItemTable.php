<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class AcmMarksDistItemTable extends Seeder {

    public function run(){

        DB::table('acm_marks_dist_item')->delete();


        $items = array(
            'Class' => 'CLAS',
            'Assignment' => 'AGMT',
            'Class Test' => 'CLAT',
            'Mid Term' => 'MIDT',
            'Final Term' => 'FINT',
            'Lab Task' => 'LABT',
            'Proposal' => 'PROP',
            'Proposal Presentation' => 'PRPR',
            'Presentation' => 'PRST',
            'Implementation' => 'IMPL',
            'Report Presentation' => 'RPPS',
            'Final Report' => 'FNPT',
            'Field Work' => 'FLDW',
            'Attendance' => 'ATTN',
        );


        foreach($items as $key => $val) {
            AcmMarksDistItem::insert(array(
                'code' => $val,
                'title' => $key,
                'is_associative' => ($val == 'CLAS') ?1 : 0,
                'is_exam' => ($val == 'MIDT' || $val == 'FINT') ? 1 : 0,
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }



    }
} 