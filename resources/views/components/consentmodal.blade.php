<div class="modal fade" id="consentm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="consenttitle" aria-hidden="true"
    x-data="{ consentcheck: false }">
    <div class="modal-dialog modal-dialog-centered modal-lg"> 
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center w-100" id="consenttitle">Data Collection Consent Form</h1>
                
            </div>
            <div class="modal-body p-3"> 
                <h5 class="text-wrap">
                    I have read the Data Privacy Statement and express my consent for the Municipal Tourism Office of Mauban to collect, record, organize, update or modify, retrieve, consult, use, consolidate, block, erase or destruct my personal data as part of my information. 
                    <br><br>
                    I hereby affirm my right to be informed, object to processing, access and rectify, suspend or withdraw my personal data, and be indemnified in case of damages pursuant to the provisions of the Republic Act No. 10173 of the Philippines, Data Privacy Act of 2012 
                    and its corresponding Implementing Rules and Regulations.
                </h5>
                <br>
                <div id="consentconfirm" class="mt-3">
                    <div class="form-check">
                        <input type="checkbox" name="consentbox" id="consentbox" x-model="consentcheck">
                        <label class="form-check-label" for="consentbox">
                            I Agree with the Data Privacy Statement and Data Privacy Act of 2012
                        </label>
                    </div>
                </div>
            </div> 
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-danger mbtn" @click="document.location.href = '{{ url('/') }}';">CANCEL</button>
                <button type="button" class="btn btn-success mbtn" data-bs-dismiss="modal" aria-label="YES" :disabled="!consentcheck">CONFIRM</button>
            </div>
        </div>
    </div>
</div>
