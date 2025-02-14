function showToast(header, message, type) {
    const timestamp = Date.now(); // Get the current timestamp in milliseconds
    const toastId = 'toast-' + timestamp; // Create a unique ID using the timestamp
	
	const toastHTML = `
    <div class="toast bg-${type}" id="${toastId}" role="alert" aria-live="assertive" aria-atomic="true">
	<div class="toast-header">
	<img src="/images/promo/macto.webp" class="rounded me-2" style="height: 50px; width: 50px;" alt="..." />
	<strong class="me-auto">${header}</strong>
	<small class="text-muted">${new Date().toLocaleTimeString()}</small>
	<button id = "toastclose" type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" onclick="document.getElementById('${toastId}').remove()"></button>
	</div>
	<div class="toast-body">
	<span id="toastmsg">${message}</span>
	</div>
    </div>`;
	
	
    const toastContainer = document.getElementById('toastContainer');
    toastContainer.insertAdjacentHTML('beforeend', toastHTML);
	
    const toastElement = document.getElementById(toastId);
    
    const bootstrapToast = new bootstrap.Toast(toastElement, { delay: 5000 });
    bootstrapToast.show();
	
    toastElement.addEventListener('hidden.bs.toast', function () {
        toastElement.remove();
	});
}
