<?php extend('common/base') ?>

<?php startblock('content') ?>

<?php

$config = array(
    'headers' => (object) array(
    	'Patient No.' => 'pub_id',
    	'OPD No.' => 'opd_no',
    	'IPD No.' => 'ipd_no',
    	'Name' => 'first_name', 
    	'Address' => 'address',
    	'Contact Number' => 'contact_number',
    	'Date Of Admission' => 'date_of_admission',
    	'Date Of Procedure' => 'date_of_procedure',
    	'Date Of Discharge' => 'date_of_discharge',
    ),
    'cur_page' => $patients_inpatient->get_current_page(),
    'base_url' => '/hospital/patient_Inpatient',
    'order_by_field' => $patients_inpatient->get_field(),
    'order_by_direction' => $patients_inpatient->get_direction(),
    'search' => $patients_inpatient->get_search_term(),
    'total_rows' => $patients_inpatient->get_total_rows(),
    'per_page' => $patients_inpatient->get_page_size(),
);

$this->bspaginator->config($config);

?>


<div class="container">

	<div class="row-fluid">
		<div class="span12">

			<div class="pull-left">
				<h2>Listing Admitted Patients</h2>
				<h5 style="margin-left:5px;">Showing result<?php echo ($patients_inpatient->get_total_rows() == 1) ? '' : 's';?> <?php echo ($patients_inpatient->get_page_size() > $patients_inpatient->get_total_rows()) ? $patients_inpatient->get_total_rows() : ($patients_inpatient->get_page_size() * ($patients_inpatient->get_current_page() - 1) + 1) .' - '. ($patients_inpatient->get_page_size() * ($patients_inpatient->get_current_page() - 1) + $patients_inpatient->get_row_per_current_page());?> of <?php echo number_format($patients_inpatient->get_total_rows());?></h5>
			</div>

			<div class="pager pull-right" style="margin-top: 5px;">
				<?php echo $this->bspaginator->pagination_links();?>
			</div>

			<br/>
	</div>

	<br/>

	<div class="row-fluid" style="margin-top:90px;">

		<div class="span12">
			<div class="row-fluid">
				<div class="span3" style="border: 1px solid #eee; padding-left: 20px; padding-right: 20px;">

					<form name="search-patient" action="<?php echo base_url('patient_Inpatient');?>">
						
						<input style="width:20%;align:left;" class="form-control" name="search" type="text" value="<?php echo $patients_inpatient->get_search_term() ? $patients_inpatient->get_search_term() : '';?>" placeholder="Type search term..." autofocus>

						<br/>
						
						<button type="submit" class="btn btn-success" style="width:20%;align:left;"><i class="icon-search icon-white"></i>Search</button>
						
					</form>
					<hr>
					<div class="span9">
						<?php if($patients_inpatient->get_total_rows() > 0){ ?>

						<div class="table-container">
							<table class="table table-striped table-bordered" style="margin-bottom:60px;">

								<?php echo $this->bspaginator->table_header();?>

								<tbody>
									<?php foreach ($patients_inpatient as $patient_inpatient) {
									 ?>
										<tr>
											<td><?php echo $patient_inpatient->patient->pub_id;?></td>
											<td><?php echo $patient_inpatient->patient->opd_no;?></td>
											<td><?php echo $patient_inpatient->patient->ipd_no;?></td>
											<td><?php echo $patient_inpatient->patient->get_full_name();?></td>						
											<td><?php echo $patient_inpatient->patient->address;?></td>
											<td><?php echo $patient_inpatient->patient->contact_number;?></td>
											<td><?php echo Patient::english_to_nepali(date('Y-m-d',strtotime($patient_inpatient->date_of_admission)));?></td>
											<td><?php if(!is_null($patient_inpatient->date_of_procedure)) echo Patient::english_to_nepali(date('Y-m-d',strtotime($patient_inpatient->date_of_procedure)));?></td>
											<td><?php if(!is_null($patient_inpatient->date_of_discharge)) echo Patient::english_to_nepali(date('Y-m-d',strtotime($patient_inpatient->date_of_discharge)));?></td>
											
											<td style="text-align:center;width:65px;">
											<?php if(!$patient_inpatient->is_deleted()) { ?>
											<div class="btn-group">
						  						<a class="btn dropdown-toggle" style="border:1px solid #eee;" data-toggle="dropdown" href="#">
						    						Actions <span class="caret"></span>
						  						</a>
												<ul class="dropdown-menu" style="text-align:left;">													
													<li><a href="<?php echo base_url('diagnosis/inpatient_diagnosis/'.$patient_inpatient->patient->pub_id.'/'.$patient_inpatient->id);?>">Add Diagnosis</a></li>
													<li><a href="<?php echo base_url('patient_inpatient/discharge_patient/'.$patient_inpatient->id);?>" onclick="return confirm_discharge();">Discharge</a></li>
												</ul>
											</div>
											<?php } ?>
											</td>
										</tr>
									<?php }?>
								</tbody>
							</table>

						<?php } else { ?>
							<div class="well" style="text-align:center; padding:100px 0;">
								<p style="font-size:24px;">No Patients found.</p>
								<p style="font-size:14px;">Your patient query has not returned any valid results.</p>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php endblock() ?>

<?php end_extend() ?>


<script type="text/javascript">

	function confirm_discharge() {
	    return confirm("Are you sure to discharge the patient?");
	}

</script>