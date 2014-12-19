<?php extend('common/base') ?>

<?php startblock('content') ?>

<div class="container">
	<div class="row-fluid">
	<div class="col-md-12">
		<div class="col-md-6">
			
			<h3>Today's Follow Ups</h3>

			<div class="clearfix"></div>
			<?php if(!empty($follow_ups)) { ?>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address</th>
							<th>Age</th>
							<th>sex</th>
							<th>Doctor</th>
						</tr>
					</thead>
					<tbody>
						<?php  foreach ($follow_ups as $follow_up){ ?>
							<tr>
								<td><?=$follow_up->patient->first_name?></td>
								<td><?=$follow_up->patient->last_name?></td>
								<td><?=$follow_up->patient->address?></td>
								<td><?=$follow_up->patient->age?></td>
								<td>
									<?php
									if($follow_up->patient->sex == 0) 
										echo "Male";
									else echo "Female";
									?>
								</td>
								<td><?=$follow_up->doctor?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<?php } else echo "NO PATIENT"; ?>
		</div>

		<div class="col-md-6">

			<h3>Patient's In Bed</h3>
			<?php if(!empty($patients_in_bed)) { ?>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address</th>
							<th>Age</th>
							<th>sex</th>
							<th>Date of Admission</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($patients_in_bed as $patient_in_bed) { ?>
							<tr>
								<td><?=$patient_in_bed->patient->first_name?></td>
								<td><?=$patient_in_bed->patient->last_name?></td>
								<td><?=$patient_in_bed->patient->address?></td>
								<td><?=$patient_in_bed->patient->age?></td>
								<td>
									<?php
									if($patient_in_bed->patient->sex == 0) 
										echo "Male";
									else echo "Female";
									?>
								</td>
								<td>
									<?php echo date('Y-m-d',strtotime($patient_in_bed->date_of_admission));?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } else echo "NO PATIENT"; ?>
		</div>			

	</div>
</div>

</div>

<?php endblock() ?>

<?php end_extend() ?>