    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Logout ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Anda Yakin Ingin Logout ??<br />Gak nyeselkan??</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{url('user/login_user/login')}}">Logout</a>
          </div>
        </div>
      </div>
    </div>
    
<!-- Bootstrap core JavaScript-->
  <script src="{{url('sbadmin2/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('sbadmin2/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('sbadmin2/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{url('sbadmin2/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{url('sbadmin2/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{url('sbadmin2/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>