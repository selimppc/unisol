<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class AccCodesparamTable extends Seeder {

    public function run(){

        DB::table('acc_codesparam')->delete();

        $items = array(
            'type' => array('Customer Group', 'Customer Group', 'Leave Plan', 'Market', 'Market', 'Market', 'Position','Product Category','Product Category','Product Category','Product Category','Product Category','Product Category','Product Category','Product Category','Product Category','Product Class','Product Class','Salary Type','Salary Type','Supplier Group','Unit Of Measurement','Unit Of Measurement','Unit Of Measurement','Unit Of Measurement','Unit Of Measurement','Unit Of Measurement','Unit Of Measurement','Unit Of Measurement','Unit Of Measurement','Unit Of Measurement','Unit Of Measurement','Unit Of Measurement' ),
            'code' => array( 'FRANCHISE','WHOLESALE','1','21','CONSUMERS','HEALTH CARE','101','ENTERTAINMENT','FASHION','HOUSEHOLD','MEDICAL SUPPLIES','MEDICINES','MEDICINES FRANCHISE','NUTRITION','PERSONAL','SUPPORT FRANCHISE','PRODUCT','SERVICE','BASIC','HOUSE RENT','WHOLESALE','BLISTER','BOTTLE','BOX','FLACON','JAR','OCS','PACK','PAIR','PCS','SACHET','SET','TUBE' ),
            'description' => array('','','General Leave Plan','Test','CONSUMERS','HEALTH CARE','A','ENTERTAINMENT','FASHION','HOUSEHOLD','Medical Supplies','MEDICINE','MEDICINES FRANCHISE','NUTRITION','PERSONAL','SUPPORT FRANCHISE','','','','','SUPPLIER','','','','','','','','','','','',''),
            'account_code' => array('103-7000','103-7000','','','','','','301-008','301-006','301-005','301-002','301-001','301-003','301-004','301-007','301-009','','','','','203-002','','','','','','','','','','','',''),
            'account_discount'=> array('403-005','403-005','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
            'account_transaction' => array('','','','','','','','407-002','407-003','407-005','NULL','407-006','NULL','407-007','407-008','','','','','','','','','','','','','','','','','',''),
            'account_debit' => array('301-010','301-010','','','','','','103-008','103-006','103-005','103-002','103-001','103-003','103-004','103-007','103-009','','','','','','','','','','','','','','','','',''),
            'account_tax' => array('203-004','203-004','','','','','','','','','','','','','','','','','','','103-7701','','','','','','','','','','','','' ),
            'status' => array('active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active','active'  ),

        );

        //AccCodesparam: for global setup table among the system
        for($i = 0;$i <= 32; $i++){
            AccCodesParam::insert(array(
                'type' => $items['type'][$i],
                'code' => $items['code'][$i],
                'description' => $items['description'][$i],
                'account_code' => $items['account_code'][$i],
                'account_discount' => $items['account_discount'][$i],
                'account_transaction' => $items['account_transaction'][$i],
                'account_debit' => $items['account_debit'][$i],
                'account_tax' => $items['account_tax'][$i],
                'status' => $items['status'][$i],
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 