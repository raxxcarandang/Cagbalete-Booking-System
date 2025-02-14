<div class="modal fade" id="batchm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="batchbook" x-data="batchbook()" @submit.prevent="batchData">
            @csrf 
			<div class="modal-content" x-data="{
			errorMessage: '',
			validBookings: [],
			validateIds() {
			this.validBookings = [];
			if (!this.ids) {
            return;
			}
			
			const idPattern = /^[a-zA-Z0-9]+$/;
			const inputIds = this.expandRanges(this.ids).split(',').map(item => item.trim()).filter(Boolean);
			this.errorMessage = '';
			
			
			const duplicateIds = inputIds.filter((value, index, self) => self.indexOf(value) !== index);
			if (duplicateIds.length > 0) {
            this.errorMessage = 'Duplicate ID(s) detected: ' + duplicateIds.join(', ') + '. Please remove duplicates.';
            return;
			}
			
			const isValid = inputIds.every(id => idPattern.test(id));
			if (isValid) {
            const invalidIds = inputIds.filter(id => !filteredBookings.some(booking => booking.id == id));
            if (invalidIds.length > 0) {
			this.errorMessage = 'Invalid ID(s) detected: ' + invalidIds.join(', ') + '. These IDs do not exist in our records.';
            } else {
			this.validBookings = inputIds.map(id => {
			const booking = filteredBookings.find(booking => booking.id == id);
			if (booking) {
			const user = filteredBookings.find(b => b.userid == booking.userid)?.user || { lname: 'Unknown', name: 'Unknown' };
			return { 
			userid: id, 
			lname: user.lname || 'Unknown', 
			name: user.name || 'Unknown', 
			arrival: booking.arrival, 
			departure: booking.departure,
			itinerary: booking.itinerary
			};
			}
			return { userid: id, lname: 'Unknown', name: 'Unknown' };
			});
            }
			} else {
            this.errorMessage = 'Invalid characters detected. Only alphanumeric IDs and commas are allowed.';
			}
			},
			
			expandRanges(ids) {
			
			const ranges = ids.split(',').map(item => item.trim());
				let expandedIds = [];
				
				ranges.forEach(range => {
				const match = range.match(/^(\d+)\s*-\s*(\d+)$/);
				if (match) {
                const start = parseInt(match[1], 10);
                const end = parseInt(match[2], 10);
                if (start <= end) {
				expandedIds = expandedIds.concat([...Array(end - start + 1).keys()].map(i => start + i));
					}
					} else {
					expandedIds.push(range);
					}
					});
					
					return expandedIds.join(',');
					},
					
					handleSubmit() {
					const idsArray = this.ids.split(',').map(item => item.trim()).filter(Boolean);
					this.$refs.idarray.value = JSON.stringify(idsArray); 
					this.$refs.batchbook.submit(); // Submit the form 
					},
					}" @resetbatchmodal.window="document.getElementById('batchbook').reset();">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="consenttitle">
							Batch Operation
						</h1>
					</div>
					<div class="modal-body" >
						<div class="mb-3" x-data="{ colorselect2: 'green', }">
							<label for="colorselector2" class="form-label" style="color: black;">Color When set to Arrived</label><br>
						
								<select 
                                    x-model="colorselect2"
                                    class="py-2 px-4 rounded-md form-select"
                                     title = 'Set Color of Arrived'
                                     name="color"
                                     @change="
                                     $nextTick(() => { $el.style.setProperty('background-color', colorselect2, 'important') });
                                     "
                                     x-init="
                                     colorselect2 = 'green';
                                     $nextTick(() => {
                                     $el.style.setProperty('background-color', colorselect2, 'important')
                                     });
                                     "
                                    >
                        		<option value="green" style="background-color: green;">Green</option>
                                <option value="gold" style="background-color: gold;" >Gold</option>
                                <option value="red" style="background-color: red;" >Red</option>
                                <option value="blue" style="background-color: blue;">Blue</option>
                                <option value="indigo" style="background-color: indigo;">Indigo</option>
                                <option value="violet" style="background-color: violet;">Violet</option>
                                <option value="purple" style="background-color: purple;">Purple</option>
                                <option value="pink" style="background-color: pink;">Pink</option>
                                <option value="lime" style="background-color: lime;">Lime</option>
                                <option value="aqua" style="background-color: aqua;">Aqua</option>
                                <option value="fuchsia" style="background-color: fuchsia;">Fuchsia</option>
                                <option value="turquoise" style="background-color: turquoise;">Turquoise</option>
                                <option value="coral" style="background-color: coral;">Coral</option>
                                <option value="maroon" style="background-color: maroon;">Maroon</option>
                            </select>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-floating mb-2">
									<select class="form-select" name="status" id="statusbat" x-model="status" data-error-msg=' ' x-validate.required>
										<option value="" disabled> Select Status</option>
										<option value="PRE-ARRIVAL">Pre-arrival</option>
										<option value="ARRIVED" selected>Arrived</option>
										<option value="CANCELLED">Cancelled</option> 
										<option value="RESCHEDULED">Rescheduled</option>   
										<option value="DELINQUENT">Delinquent</option>
										<option value="DELETE">DELETE BOOKINGS</option>
									</select>
									<label for="status">Status</label>
								</div>
							</div>
						</div>
						<template x-if="status == 'RESCHEDULED'">
							<div class="row">
								<div class="col">
									<div class="form-floating mb-2">
										<input type="date" name = "arrival" class="form-control" id="arrival" placeholder="12/25/2024" min = "<?php echo date('Y-m-d') ?>" :max = "rdate" :value="arrivaldb" x-model="adate" @change="rdate = adate;" data-error-msg='Invalid Date' x-validate.required>
										<label for="arrival">New Arrival Date</label>
									</div>
								</div>
								<div class="col">
									<div class="form-floating mb-2">
										<input type="date" name = "departure" class="form-control" id="departure" placeholder="01/01/2025" :min = "adate" :value="returndb" x-model="rdate" data-error-msg='Invalid Date' x-validate.required>
										<label for="departure">New Return Date</label>
									</div>
								</div>
								<input type = "hidden" :value = "itinerary" name = "itinerary" id = "itr" />
							</div>
						</template>
						<div class="row">
							<div class="mb-3">
								<label for="remarea" class="form-label" style="color: black;">Remark to All</label>
								<textarea class="form-control" x-model="remarkarea" id="remarea" name="remark" rows="3"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="mb-3">
								<label for="idarea" class="form-label" style="color: black;">Booking IDs (e.g., '1, 2, 4-6, 8')</label>
								<textarea class="form-control" x-model="ids" id="idarea" name="idarray" rows="3" @input="validateIds()" @focus="validateIds()"></textarea>
							</div>
							<span x-text="errorMessage" style="color: red;"></span>
							<div class="mb-3">
								<label for="batcharea" class="form-label" style="color: black;">Bookings Affected</label>
								<textarea class="form-control" disabled 
								:value="validBookings.map(booking => booking.name + ' ' + booking.lname + '\'s Booking #' + booking.userid + ' (' + booking.arrival + ' -> ' + booking.departure + ')' + ' ' + booking.itinerary).join('\n')" 
								id="batcharea" name="idpreview" rows="7">
								</textarea>
							</div>
						</div>
					</div>
					<div class="modal-footer" x-init="remarkarea = 'N/A'">
						<input type="hidden" id="idarray" name="idarray" x-ref="idarray" />
						<button type="button" class="btn btn-secondary" id="batchcancel" data-bs-dismiss="modal" @click="$dispatch('resetbatchmodal');">CANCEL</button>
						<button type="submit" id="batchbtn" class="btn btn-success" aria-label="YES" :disabled="errorMessage || formLoading"
						@click="
						timediff = Math.abs(Date.parse(rdate) - Date.parse(adate)); 
						datediff = Math.floor(timediff / (1000 * 60 * 60 * 24)); 
						
						if (datediff == 0) {
						itinerary = 'Day Tour';
						}
						if (datediff == 1) {
						itinerary = 'Overnight';
						}
						if (datediff == 2) {
						itinerary = '2 Nights';
						}
						if (datediff == 3) {
						itinerary = '3 Nights';
						}
						if (datediff == 4) {
						itinerary = '4 Nights';
						}
						if (datediff >= 5) {
						itinerary = '5+ Nights';
						}
						
						handleSubmit();
						"
						>
							<span x-text="buttonText" id="batchtxt" @shown.bs.modal.window()="document.getElementById('idarea').focus()"></span>
						</button>
					</div>
			</div>
		</form> 
	</div>
</div>
