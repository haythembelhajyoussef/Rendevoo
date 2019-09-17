<!-- START PRELOADS -->

<div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to remove this row?</p>                    
                <p>Press Yes if you sure.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->       
<audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->             

<!-- START SCRIPTS -->
<!-- START PLUGINS -->

<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>  

<!-- END PLUGINS -->

<!-- THIS PAGE PLUGINS -->
<script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
<script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
<script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>           
<script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>

<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="js/jquery.dynatable.js"></script>
<link href="css/jquery.dynatable.css" rel="stylesheet">   

<script type="text/javascript" src="js/plugins/moment.min.js"></script>
<script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
<!-- END THIS PAGE PLUGINS -->       



<script type="text/javascript" src="js/plugins.js"></script>        
<script type="text/javascript" src="js/actions.js"></script>        
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->  
<script>
    function delete_row(row) {

        var box = $("#mb-remove-row");
        box.addClass("open");

        box.find(".mb-control-yes").on("click", function () {
            box.removeClass("open");
            var href = $(row).attr('dataid');
            $.ajax({
                url: href,
                method: 'GET',
                success: function (rep) {
                    $(row).parent().parent().hide("slow", function () {
                        $(this).remove();
                    });
                }
            });

        });
    }
    $(function () {
        $('table').dynatable();
        var nombre_msg = $('.nombre_msg');
        var body_msg = $('.body_msg');
        function msg() {
            $.ajax({
                url: 'controlleur/afficheContact.php',
                method: '',
                dataType: 'json',
                success: function (rep) {
                    body_msg.html("");
                    nombre_msg.html(rep.length);
                    $.each(rep, function (i, v) {
                        body_msg.append('<a href="" class="list-group-item"><span class="contacts-title">' + v.nom + ' ' + v.prenom + '</span><p>' + v.contenu + '</p> </a>');
                    });
                }

            });
        }
        msg();
        setInterval(msg, 2000);

    });


    $(function () {
        var nombre_notif = $('.nombre_notif');
        var body_notif = $('.body_notif');
        function msg() {
            $.ajax({
                url: 'controlleur/afficheNotification.php',
                method: '',
                dataType: 'json',
                success: function (rep) {
                    body_notif.html("");
                    nombre_notif.html(rep.length);
                    $.each(rep, function (i, v) {
                        body_notif.append('<a href="" class="list-group-item"><span class="contacts-title">' + v.date + '</span><p>' + v.message + '</p> </a>');

                    });
                }

            });
        }
        msg();
        setInterval(msg, 2000);

    });
</script>