<!-- Footer -->
<footer class="sticky-footer bg-white mt-3">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; WeLearning 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/js/') ?>jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/js/') ?>bootstrap/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/js/') ?>jquery/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/js/chart/') ?>chart.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/chart-pie-demo.js"></script>

<!-- JS Calendar -->
<script src="<?= base_url('assets/') ?>js/calender/get.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/datatables/datatables-demo.js"></script>
<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>js/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>js/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Jquery Slider -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/chart/chart-area-demo.js"></script>
<script src="<?= base_url('assets/') ?>js/chart/chart-pie-demo.js"></script>
<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>js/chart/Chart.min.js"></script>
<!-- Jquery Slider -->
<script src="<?= base_url('assets/js/') ?>slider.js"></script>

<!-- Javascrip View All -->
<script src="https://kit.fontawesome.com/3e89cfe6ad.js" crossorigin="anonymous"></script>

<script type="text/javascript" src="jquery-comments.js"></script>
<script src="scriptcomment.js"></script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName)
    })
</script>
<script src="<?= base_url('assets/js/') ?>view-all.js"></script>
</body>
<style type="text/css">
    .udtitle {
        margin-top: 20px;
        margin-bottom: 10px;
        margin-left: 15px;
        font-size: 18px;
        color: black;
    }

    .udisi {
        font-size: 16px;
        color: black;
        opacity: 0.5;
        margin-left: 15px;
    }

    .coursedetail {
        margin-top: 15px;
        font-size: 18px;
        color: black;
        margin-left: 15px;
    }

    .loginact1 {
        margin-left: 10px;
        margin-top: 15px;
        font-size: 20px;
        color: black;
    }

    .loginact2 {
        margin-left: 10px;
        margin-top: 15px;
        font-size: 18px;
        color: black;
    }

    .loginact3 {
        margin-left: 10px;
        margin-top: 15px;
        font-size: 15px;
        color: black;
    }

    .see-all-text {
        display: none;
    }

    .see-all-button {
        color: #3992E4;
        margin-top: 15px;
        margin-bottom: 15px;
        text-align: center;
    }

    .see-all-text--show {
        display: inline;
    }
</style>

</html>