<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_diagnosis_detail extends CI_Migration {

	public function up() {
		$fields = array(
			'ID' => array(
				'type' => 'int',
				'auto_increment' => true,
			),
			'DiagnosisID' => array(
				'type' => 'int',
			),
			'Diagnosis' => array(
				'type' => 'varchar',
				'null' => False,
			),
			'Doctor' => array(
				'type' => 'datetime',
				'null' => False,
			),
			'ConsultationType' => array(
				'type' => 'datetime',
				'null' => False,
			),

			'TypeId' => array(
				'type' => 'int',
				'null'=>False,
			),

			'CreatedAt' => array(
				'type' => 'datetime',
			),
			'ModifiedAt' => array(
				'type' => 'timestamp',
			),
			'Active' => array(
				'type' => 'boolean',
				'default' => 1,
			),

			'Deleted' => array(
				'type'=>'boolean',
				'default'=> 0,
			),
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('ID', true);
		$this->dbforge->create_table('patient_diagnosis_detail');

	}

	public function down() {

		$this->dbforge->drop_table('patient_diagnosis_detail');

	}
}