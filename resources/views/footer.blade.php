<!-- COMMON SCRIPTS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/common_scripts.min.js"></script>
<script src="js/velocity.min.js"></script>
<script src="js/common_functions.js"></script>

<!-- Wizard script-->
<script type="text/javascript">
    var timestamp = '<?php time();?>';

    function updateTime() {
        $('#time').html(Date('timestamp'));
        timestamp++;
    }

    $(function () {
        setInterval(updateTime, 1000);
    });
</script>

<!-- System -->
<script src="js/absen.js"></script>
