
                //show consent modal
                $(document).ready(function() {
                    $('#consentm').modal('show');
                });
    
                    //basic form validation
                const form = document.querySelector('form');
        
                form.addEventListener('submit', e => {
                if (!form.checkValidity()) {
                e.preventDefault()
                }
    
    
                form.classList.add('was-validated');
                })
    
                    //Element Id Variables
                var regionopt = document.getElementById("optregion");
                var resortopt = document.getElementById("optresort");
                var parkingopt = document.getElementById("optparking");
                var purposeopt = document.getElementById("optpurpose");
                var originopt = document.getElementById("optorigin");
                var regionint = document.getElementById("tregion");
                var originint = document.getElementById("torigin");
                var resortint = document.getElementById("toresort");
                var parkingint = document.getElementById("toparking");
                var purposeint = document.getElementById("topurpose");
    
                /* visitor counts
                var vstc = document.getElementsById('tvisitorc');
                var fgrc = document.getElementsById('tforeignerc');
                var fpoc = document.getElementsById('tfilipinoc');
                var mbnc = document.getElementsById('tmaubaninc');
                var malec = document.getElementsById('tmalec');
                var femalec = document.getElementsById('tfemalec');
                var specialc = document.getElementsById('tspecialc');
                var sevenyoc = document.getElementsById('tsevenyoc');
                var fiftyc = document.getElementsById('tfifnineyoc');
                var sixtyc = document.getElementsById('tsixtyoc');
                */
                
                    //functions for optional input fields and redirects
                function disagree() {
                    window.location.href="index.html";
                }
    
                /* visitor count function
                function count() {
                    vstc.value = (fgrc.value + fpoc.value)
                }
            */
    
                function countrycheck() {
                    var countryselect = document.getElementById("tcountry").value;
                    if (countryselect == "0") {
                    originopt.style.display = "block"; 
                    regionopt.style.display = "none";
                    $('#tregion').prop('selectedIndex', 18);
                    $('#tregion').attr('value', 'INTERNATIONAL');
                    originint.value= "";    
                    } 
			else if (countryselect == "2") {
                    originopt.style.display = "block"; 
                    regionopt.style.display = "none";
                    $('#tregion').prop('selectedIndex', 5);
                    $('#tregion').attr('value', 'CALABARZON');
                    originint.value= "";    
                    } 
        
                    else {
                    originopt.style.display = "none";
                    regionopt.style.display = "block";
                    $('#tregion').prop('selectedIndex', 0);
                    originint.value = "NONE";
                    }
                }
             
                function resortcheck() {
                    var resortselect = document.getElementById("tresort").value;
                    if (resortselect == "O") {
                    resortopt.style.display = "block"; 
                    resortint.value= "";    
                    } 
        
                    else {
                    resortopt.style.display = "none";
                    resortint.value = "NONE";
                    }
                }
        
                function parkingcheck() {
                    var parkselect = document.getElementById("tparking").value;
        
                    if (parkselect == "O") {
                    parkingopt.style.display = "block"; 
                    parkingint.value = "";    
                    } 
        
                    else {
                    parkingopt.style.display = "none";
                    parkingint.value = "NONE";
                    }
                }
        
                function purposecheck() {
                    var purposeselect = document.getElementById("tpurpose").value;
                    if (purposeselect == "O") {
                    purposeopt.style.display = "block"; 
                    purposeint.value = "";    
                    } 
        
                    else {
                    purposeopt.style.display = "none";
                    purposeint.value = "NONE";
                    }
                }