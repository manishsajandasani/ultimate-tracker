<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- Sweetalert -->
<script src="{{ asset('admin/dist/js/sweetalert2-v11.7.12.js') }}"></script>
<!-- Common Admin Script -->
<script src="{{ asset('admin/dist/js/new-admin-script.js') }}"></script>

@yield('admin-scripts')

<script>
    @if(Session::has('operation-fail'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ Session::get('operation-fail') }}"
        });
        
        {{ Session::forget('operation-fail') }}
    @endif

    @if(Session::has('entity-added-success'))
        Swal.fire({
        icon: 'success',
        title: 'Done',
        text: "{{ Session::get('entity-added-success') }}"
        });

        {{ Session::forget('entity-added-success') }}
    @endif
    
    @if(Session::has('entity-updated-success'))
        Swal.fire({
        icon: 'success',
        title: 'Done',
        text: "{{ Session::get('entity-updated-success') }}"
        });

        {{ Session::forget('entity-updated-success') }}
    @endif
    
    @if(Session::has('entity-deleted-success'))
        Swal.fire({
        icon: 'success',
        title: 'Done',
        text: "{{ Session::get('entity-deleted-success') }}"
        });

        {{ Session::forget('entity-deleted-success') }}
    @endif

    @if(Session::has('entity-already-exist'))
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ Session::get('entity-already-exist') }}"
        });

        {{ Session::forget('entity-already-exist') }}
    @endif
</script>
</body>

</html>