<!-- jquery -->
<script src="{{ asset('public/frontend/js/jquery-3.6.0.min.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('public/frontend/js/bootstrap.bundle.min.js') }}"></script>
<!-- swipper js -->
<script src="{{ asset('public/frontend/js/swiper.min.js') }}"></script>
<!-- lightcase js-->
<script src="{{ asset('public/frontend/js/lightcase.js') }}"></script>
<!-- odometer js -->
<script src="{{ asset('public/frontend/js/odometer.min.js') }}"></script>
<!-- viewport js -->
<script src="{{ asset('public/frontend/js/viewport.jquery.js') }}"></script>
<!-- smooth scroll js -->
<script src="{{ asset('public/frontend/js/smoothscroll.min.js') }}"></script>
<!-- nice select js -->
<script src="{{ asset('public/frontend/js/jquery.nice-select.js') }}"></script>

<!-- Apex Chart -->
<script src="{{ asset('public/frontend/js/apexcharts.min.js') }}"></script>
<!-- aos js -->
<script src="{{ asset('public/frontend/js/aos.js') }}"></script>

<!-- Select 2 JS -->
<script src="{{ asset('public/backend/js/select2.min.js') }}"></script>
<script src="{{ asset('public/backend/library/popup/jquery.magnific-popup.js') }}"></script>


<!-- main -->
<script src="{{ asset('public/frontend/js/main.js') }}"></script>



@include('admin.partials.notify')


<script>
    /**
 * Function for open delete modal with method DELETE
 * @param {string} URL
 * @param {string} target
 * @param {string} message
 * @returns
 */
function openAlertModal(URL,target,message,actionBtnText = "{{ __('Remove') }}",method = "DELETE"){
  if(URL == "" || target == "") {
      return false;
  }

  if(message == "") {
      message = "Are you sure to delete ?";
  }
  var method = `<input type="hidden" name="_method" value="${method}">`;
  openModalByContent(
      {
          content: `<div class="card modal-alert border-0">
                      <div class="card-body">
                          <form method="POST" action="${URL}">
                              <input type="hidden" name="_token" value="${laravelCsrf()}">
                              ${method}
                              <div class="head mb-3">
                                  ${message}
                                  <input type="hidden" name="target" value="${target}">
                              </div>
                              <div class="foot d-flex align-items-center justify-content-between">
                                  <button type="button" class="modal-close btn--base btn-for-modal">{{ __("Close") }}</button>
                                  <button type="submit" class="alert-submit-btn btn--base bg-danger btn-loading btn-for-modal">${actionBtnText}</button>
                              </div>
                          </form>
                      </div>
                  </div>`,
      },

  );
}


</script>

