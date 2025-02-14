      var currentStep = 1;
        var updateProgressBar;
		
        function displayStep(stepNumber) {
			if (stepNumber >= 1 && stepNumber <= 6) {
				$(".step-" + currentStep).hide();
				$(".step-" + stepNumber).show();
				currentStep = stepNumber;
				updateProgressBar();
			}
		}
		
        $(document).ready(function() {
            $('#multi-step-form').find('.step').slice(1).hide();
			
            $(".next-btn").click(function() {
				if (currentStep < 6) {
					$(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
					currentStep++;
					setTimeout(function() {
						$(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
						$(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
						updateProgressBar();
					}, 500);
				}
			});
			
            $(".prev-btn").click(function() {
				if (currentStep > 1) {
					$(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
					currentStep--;
					setTimeout(function() {
						$(".step").removeClass("animate__animated animate__fadeOutRight").hide();
						$(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
						updateProgressBar();
					}, 500);
				}
			});
			
            updateProgressBar = function() {
				var progressPercentage = ((currentStep - 1) / 5) * 100;
				$(".progress-bar").css("width", progressPercentage + "%");
				
				if (progressPercentage <= 16 ) {
					$("#cardot1").css("border", "gold solid 2px");
					$("#cardot2").css("border", "none");
					$("#cardot3").css("border", "none");
					$("#cardot4").css("border", "none");
					$("#cardot5").css("border", "none");
					$("#cardot6").css("border", "none");
				}
				if (progressPercentage > 16 && progressPercentage <=  33) {
					$("#cardot1").css("border", "gold solid 2px");
					$("#cardot2").css("border", "gold solid 2px");
					$("#cardot3").css("border", "none");
					$("#cardot4").css("border", "none");
					$("#cardot5").css("border", "none");
					$("#cardot6").css("border", "none");
				}
				if (progressPercentage > 33 && progressPercentage <=  49) {
					$("#cardot1").css("border", "gold solid 2px");
					$("#cardot2").css("border", "gold solid 2px");
					$("#cardot3").css("border", "gold solid 2px");
					$("#cardot4").css("border", "none");
					$("#cardot5").css("border", "none");
					$("#cardot6").css("border", "none");
				}
				if (progressPercentage > 49 && progressPercentage <=  65) {
					$("#cardot1").css("border", "gold solid 2px");
					$("#cardot2").css("border", "gold solid 2px");
					$("#cardot3").css("border", "gold solid 2px");
					$("#cardot4").css("border", "gold solid 2px");
					$("#cardot5").css("border", "none");
					$("#cardot6").css("border", "none");
				}
				if (progressPercentage > 65 && progressPercentage <=  81) {
					$("#cardot1").css("border", "gold solid 2px");
					$("#cardot2").css("border", "gold solid 2px");
					$("#cardot3").css("border", "gold solid 2px");
					$("#cardot4").css("border", "gold solid 2px");
					$("#cardot5").css("border", "gold solid 2px");
					$("#cardot6").css("border", "none");
				}
				if (progressPercentage > 81 ) {
					$("#cardot1").css("border", "gold solid 2px");
					$("#cardot2").css("border", "gold solid 2px");
					$("#cardot3").css("border", "gold solid 2px");
					$("#cardot4").css("border", "gold solid 2px");
					$("#cardot5").css("border", "gold solid 2px");
					$("#cardot6").css("border", "gold solid 2px");
				}
				
			}
		});