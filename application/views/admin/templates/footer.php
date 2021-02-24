<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="#">Intellisense</a>
  </div>
  <div class="footer-right">
  </div>
</footer>
</div>
</div>
<!-- General JS Scripts -->
<!-- JS Libraies -->
<!-- <script src="<?php echo base_url(); ?>assets/bundles/echart/echarts.js"></script>
  <script src="<?php echo base_url(); ?>assets/bundles/chartjs/chart.min.js"></script> -->
<!-- Page Specific JS File -->
<!-- <script src="<?php echo base_url(); ?>assets/js/page/index.js"></script> -->

</body>

</html>

<script>
  $(function() {
    var current = window.location.href;
    $('ul li a').each(function() {
      var $this = $(this);
      // if the current path is like this link, make it active
      if ($this.attr('href') == current) {
        $this.parent().addClass('active');
        $this.parent().closest('ul').closest('li').addClass('active');
      }
    })
  })
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>