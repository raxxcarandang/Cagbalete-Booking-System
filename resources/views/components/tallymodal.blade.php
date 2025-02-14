

<div class="modal fade" id="tallym" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true" 
x-data = "{


}"
@recount.window = "
amount = isNaN(parseInt(base)) ? 0 : parseInt(base) * (isNaN(parseInt(tvisitor)) ? 0 : parseInt(tvisitor));
discount = isNaN(parseInt(discount)) ? 0 : (
(parseInt(discount) > amount) 
? amount 
: (isNaN(parseInt(base)) ? 0 : parseInt(base)) * (isNaN(parseInt(tmaubanin)) ? 0 : parseInt(tmaubanin)) 
+ ((isNaN(parseInt(base)) ? 0 : parseInt(base)) - (isNaN(parseInt(deducted)) ? 0 : parseInt(deducted))) 
* ((isNaN(parseInt(tzero7)) ? 0 : parseInt(tzero7)) 
+ (isNaN(parseInt(t60)) ? 0 : parseInt(t60)) 
+ (isNaN(parseInt(tpriority)) ? 0 : parseInt(tpriority)))
);
namount = discount < 0 ? 0 : amount - discount;

if ((parseInt(tmaubanin) + parseInt(tfilipino) + parseInt(tforeigner)) != parseInt(tvisitor)) {
natblock = true;
document.getElementById('mauban').style = 'border: 1px solid red';
document.getElementById('pinoy').style = 'border: 1px solid red';
document.getElementById('afam').style = 'border: 1px solid red';
} else {
document.getElementById('mauban').style = 'border: none';
document.getElementById('pinoy').style = 'border: none';
document.getElementById('afam').style = 'border: none';
natblock = false;
}

if ((parseInt(tzero7) + parseInt(tthirth) + parseInt(t60)) != parseInt(tvisitor)) {
ageblock = true;
document.getElementById('kids').style = 'border: 1px solid red';
document.getElementById('teen').style = 'border: 1px solid red';
document.getElementById('oldie').style = 'border: 1px solid red';
} else {
document.getElementById('kids').style = 'border: none';
document.getElementById('teen').style = 'border: none';
document.getElementById('oldie').style = 'border: none';
ageblock = false;

}

if((parseInt(tzero7) > 0 && parseInt(tthirth) == 0 && parseInt(t60) == 0)) {
childblock = true;
document.getElementById('teen').style = 'border: 1px solid red';
document.getElementById('oldie').style = 'border: 1px solid red';
} else {
childblock = false;

}

if(natblock || ageblock || childblock || tpriority > tvisitor || !tpriority || tvisitor <= 0) { 
personblock = true; 
document.getElementById('cardot5').style = 'background: red;';
} 
else { 
personblock = false;
document.getElementById('cardot5').style = 'background: #1e62d8; border: gold solid 2px;';


}


"

x-init="

$nextTick(() => { $dispatch('recount'); });

"
>
	<div class="modal-dialog modal-lg modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title fs-5" id="updatetitle">
				UPDATE BOOKING # <span x-text="bookid"></span>'S GUESTS</h5>
			</div>
			
			<div class="modal-body">
				<h5>BOOKING GUESTS UPDATE FORM</h5>
				<form action = "{{ route('updatebooktally') }}" method = "POST" id = "updatetally"  x-validate.input @submit="$validate.submit" novalidate>
					@csrf 
					
					<div class="row">
						<div class="col-sm-4" >
							<span class="form-label">Specify By:</span>
						</div>
					</div>
					<div class="row">	
						
						
						
						<div class="input-group input-group-sm mb-1">
							<div class="input-group-prepend">
								<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default-tg" >Total Guests</span>
							</div>
							<input type="number" id="guestipt" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" x-model ="tvisitor" min="0" max="999" @input.change="$dispatch('recount');" @click="$dispatch('recount');" @blur="$dispatch('recount');" disabled>
							
						</div>
						
						<input type="hidden" name="visitors" x-model="tvisitor" />
					</div>
					<div class="row">
						<span class="form-label">Sex</span>
						<div class="col-6">
							<div class="input-group input-group-sm mb-1">
								<div class="input-group-prepend">
									<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default-g" >&nbsp;<i class="ion-ios-male" style="color: #000080;"></i>&nbsp;&nbsp;Male</span>
								</div>
								<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="male" id="maleint" x-model ="tmale" min="0" max="999" @input.change="$dispatch('recount'); tvisitor = parseInt(tmale) + parseInt(tfemale); " @click="$dispatch('recount'); tvisitor = parseInt(tmale) + parseInt(tfemale); $dispatch('noblank'); if($el.value == 0) { $el.value = ''; } " @blur="$dispatch('recount'); tvisitor = parseInt(tmale) + parseInt(tfemale);  $dispatch('noblank'); " x-validate.required>
								<div class="error-msg text-sm text-red-600 col-12">
									Invalid Amount
								</div>
							</div>
							
						</div>
						<div class="col-6">
							<div class="input-group input-group-sm mb-1">
								<div class="input-group-prepend">
									<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default-g" ><i class="ion-ios-female" style="color: #AA336A;"></i>&nbsp;Female</span>
								</div>
								<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="female" id="femaleint" x-model ="tfemale" min="0" max="999" @input.change="$dispatch('recount'); tvisitor = parseInt(tmale) + parseInt(tfemale);  " @click="$dispatch('recount'); tvisitor = parseInt(tmale) + parseInt(tfemale); $dispatch('noblank'); if($el.value == 0) { $el.value = ''; }" @blur="$dispatch('recount'); tvisitor = parseInt(tmale) + parseInt(tfemale);  $dispatch('noblank'); " x-validate.required  />
								<div class="error-msg text-sm text-red-600 col-12">
									Invalid Amount
								</div>
							</div>
							
						</div>
					</div>
					<div class="row">
						
						<div class="col-6">
							<span class="form-label">Nationality</span>&nbsp;<span x-show='(parseInt(tmaubanin) + parseInt(tfilipino) + parseInt(tforeigner)) != parseInt(tvisitor) && !isNaN(tvisitor) && tvisitor != ""' id = "tallyerror">∑(<span x-text="tvisitor"></span>)</span>
							<div class="input-group input-group-sm mb-1">
								<div class="input-group-prepend">
									<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default" >&nbsp;&nbsp;<img src ="/images/nation/un.webp" id= "bookun" />&nbsp;Tourists</span>
								</div>
								<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="afam" name="foreigners" x-model ="tforeigner" min="0" max="999"  @input.change="$dispatch('recount');" @click="$dispatch('recount'); $dispatch('noblank'); if($el.value == 0) { $el.value = ''; }" @blur="$dispatch('recount');  $dispatch('noblank');" x-validate.required  />
								<div class="error-msg text-sm text-red-600 col-12">
									Invalid Amount
								</div>
							</div>
							
							
						</div>
						<div class="col-6">
							<span class="form-label">Age</span>&nbsp;<span x-show='(parseInt(tzero7) + parseInt(tthirth) + parseInt(t60)) != parseInt(tvisitor) && tvisitor != "" && !isNaN(tvisitor)' id = "tallyerror">∑(<span x-text="tvisitor"></span>)</span>
							<div class="input-group input-group-sm mb-1">
								<div class="input-group-prepend">
									<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default" >&nbsp;&nbsp;<img src ="/images/symbol/kid.png" id= "bookkid"/>&nbsp;0 - 7 Y. O.</span>
								</div>
								<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="kids" name="zero7" x-model ="tzero7" min="0" max="999" @input.change="$dispatch('recount');" @click="$dispatch('recount'); $dispatch('noblank'); if($el.value == 0) { $el.value = ''; }" @blur="$dispatch('recount');  $dispatch('noblank');" x-validate.required  />
								<div class="error-msg text-sm text-red-600 col-12">
									Invalid Amount
								</div>
							</div>
							
						</div>
						<div class="col-6">
							<div class="input-group input-group-sm mb-1">
								<div class="input-group-prepend">
									<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default" ><img src ="/images/nation/mn.webp" id= "bookmn"/>&nbsp;Maubanins</span>
								</div>
								<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="mauban" name="maubanins" x-model ="tmaubanin" min="0" max="999" @input.change="$dispatch('recount');" @click="$dispatch('recount'); $dispatch('noblank'); if($el.value == 0) { $el.value = ''; }" @blur="$dispatch('recount');  $dispatch('noblank');" x-validate.required  />
								<div class="error-msg text-sm text-red-600 col-12">
									Invalid Amount
								</div>
							</div>
							
						</div>
						
						<div class="col-6">
							<div class="input-group input-group-sm mb-1">
								<div class="input-group-prepend">
									<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default" >&nbsp;<img src ="/images/symbol/mature.png" id= "bookmature"/>&nbsp;13 - 59 Y. O.</span>
								</div>
								<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="teen" name="thirth" x-model ="tthirth" min="0" max="999" @input.change="$dispatch('recount');" @click="$dispatch('recount'); $dispatch('noblank'); if($el.value == 0) { $el.value = ''; }" @blur="$dispatch('recount');  $dispatch('noblank');" x-validate.required  />
								<div class="error-msg text-sm text-red-600 col-12">
									Invalid Amount
								</div>
							</div>
							
							
						</div>
						<div class="col-6">
							<div class="input-group input-group-sm mb-1">
								<div class="input-group-prepend">
									<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default" >&nbsp;&nbsp;<img src ="/images/nation/ph.webp" id= "bookph"/>&nbsp;Filipinos</span>
								</div>
								<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="pinoy" name="filipinos" x-model ="tfilipino" min="0" max="999" @input.change="$dispatch('recount');" @click="$dispatch('recount'); $dispatch('noblank'); if($el.value == 0) { $el.value = ''; }" @blur="$dispatch('recount');  $dispatch('noblank');" x-validate.required  />
								<div class="error-msg text-sm text-red-600 col-12">
									Invalid Amount
								</div>
							</div>
							
						</div>
						<div class="col-6">
							<div class="input-group input-group-sm mb-1">
								<div class="input-group-prepend">
									<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default" >&nbsp;&nbsp;<img src ="/images/symbol/old.png" id= "bookold"/>&nbsp;60+ Y. O.</span>
								</div>
								<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="oldie" name="above60" x-model ="t60" min="0" max="999" @input.change="$dispatch('recount');" @click="$dispatch('recount'); $dispatch('noblank'); if($el.value == 0) { $el.value = ''; }" @blur="$dispatch('recount');  $dispatch('noblank');" x-validate.required  />
								<div class="error-msg text-sm text-red-600 col-12">
									Invalid Amount
								</div>
							</div>
							
						</div>
					</div>
					
					
					
					
					
					<div class="row">
						
						<div class="col-12">
							<span class="form-label">Priority</span>
							<div class="input-group input-group-sm mb-1">
								<div class="input-group-prepend">
									<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default-pg"><img src ="/images/symbol/spc.png" id= "bookspc"/>&nbsp;Priority Guests</span>
								</div>
								<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="priority" id="priorityipt" x-model ="tpriority" min="0" max="999" @input.change="$dispatch('recount');" @click="$dispatch('recount'); $dispatch('noblank'); if($el.value == 0) { $el.value = ''; }" @blur="$dispatch('recount');" x-validate.required='$el.value <= parseInt(tvisitor)';  />
								
								<div class="error-msg text-sm text-red-600 col-12">
									Invalid Amount
								</div>
							</div>
							
							
						</div>
						
					</div>
					
					
				</div>
				
				
				
				<input type="hidden" name="id" id="id" :value = "bookid" />
				
				<input type="hidden" name="amount" id="amt" :value = "amount" />
				
				<input type="hidden" name="discount" id="diss" :value = "discount" />
				
				<input type="hidden" name="namount" id="namt" :value = "namount" />
				
				<div class="modal-footer" 
				@noblank.window = "
				tmale = (tmale == '' || !tmale) ? 0 : tmale;
				tfemale = (tfemale == '' || !tfemale) ? 0 : tfemale;
				tfilipino = (tfilipino == '' || !tfilipino) ? 0 : tfilipino;
				tmaubanin = (tmaubanin == '' || !tmaubanin) ? 0 : tmaubanin;
				tforeigner = (tforeigner == '' || !tforeigner) ? 0 : tforeigner;
				tzero7 = (tzero7 == '' || !tzero7) ? 0 : tzero7;
				tthirth = (tthirth == '' || !tthirth) ? 0 : tthirth;
				t60 = (t60 == '' || !t60) ? 0 : t60;
				tpriority = (tpriority == '' || !tpriority) ? 0 : tpriority;
				
				"
				>
					<button type="button" id = "updcancel" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
					<button type="submit" id="updbtn" class="btn btn-success" aria-label="UPDATE" :disabled="personblock" @click="$dispatch('recount');">
						UPDATE
					</button>
				</form> 
			</div>
		</div>
	</div>
	<span @x-init="
	
	$nextTick(() => { 
	document.getElementById('guestipt').focus();
	document.getElementById('maleint').focus();
	document.getElementById('femaleint').focus();
	document.getElementById('afam').focus();
	document.getElementById('mauban').focus();
	document.getElementById('pinoy').focus();
	document.getElementById('oldie').focus();
	document.getElementById('teen').focus();
	document.getElementById('kids').focus();
	document.getElementById('priorityipt').focus();
	document.getElementById('priorityipt').focus();
	});
	document.getElementById('guestipt').focus();
	document.getElementById('maleint').focus();
	document.getElementById('femaleint').focus();
	document.getElementById('afam').focus();
	document.getElementById('mauban').focus();
	document.getElementById('pinoy').focus();
	document.getElementById('oldie').focus();
	document.getElementById('teen').focus();
	document.getElementById('kids').focus();
	document.getElementById('priorityipt').focus();
	document.getElementById('priorityipt').focus();
	"></span>
	
</div>