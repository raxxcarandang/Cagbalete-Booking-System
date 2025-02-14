
<div class="modal fade" id="exportm" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true">
	<div class="modal-dialog">
		<form method = "POST" id = "expbook" x-data="exportbook()" @submit.prevent="exportData">
			@csrf 
			<div class="modal-content" >
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="consenttitle">
						EXPORT DATA
					</div>
					<div class="modal-body">
						<!--
							<div class="row">
							<div class="form-check">
							<input class="form-check-input" type="radio" name="frequency" id="daily" value="daily"
							x-model="frequency">
							<label class="form-check-label" for="daily">
							Daily
							</label>
							</div>
							<div class="form-check">
							<input class="form-check-input" type="radio" name="frequency" id="weekly" value="weekly"
							x-model="frequency">
							<label class="form-check-label" for="weekly">
							Weekly
							</label>
							</div>
							<div class="form-check">
							<input class="form-check-input" type="radio" name="frequency" id="monthly" value="monthly"
							x-model="frequency">
							<label class="form-check-label" for="monthly">
							Monthly
							</label>
							</div>
							<div class="form-check">
							<input class="form-check-input" type="radio" name="frequency" id="yearly" value="yearly"
							x-model="frequency">
							<label class="form-check-label" for="yearly">
							Yearly
							</label>
							</div>
						-->
						
						<div class="row">
							<div class="col">
								<select 
								id="expselect"
								title = 'Exportable Data'
								class = "form-select sortselector"
								>
									<option value="" selected> Select From Available Dates</option>
									<template x-for="report in reports" :key="report.id">
										<option :value="report.report_date"><span x-text="report.report_date"></span></option>
									</template>
									<option x-show="reports.length < 1">No Data Available For Export</option>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							
							<button type="button" class="btn btn-secondary" id="expcancel" data-bs-dismiss="modal">CLOSE</button>
							<button type="button" class="btn btn-info">PREVIEW</button>
							<button type="submit" class="btn btn-success" id="expbtn"><span x-text="buttonText">EXPORT</span></button>
							
						</div>
					</div>
				</form> 
			</div>
		</div>
		
	</div>
	
