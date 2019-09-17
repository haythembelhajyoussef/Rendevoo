(function ($) {
        $('calendrier').each(function () {
            var ele = $(this);
            ele.html("<div class='header'><div class='press'><span class='glyphicon glyphicon-chevron-left'></span></div><div class='next'><span class='glyphicon glyphicon-chevron-right'></span> </div></div><div class='body'></div>");
            chargement(ele);
            event(ele);

        });
        function event(ele) {
            ele.find('.press').click(function () {
                ele.attr('datas', parseInt(ele.attr('datas')) - 1);
                chargement(ele);
            });
            ele.find('.next').click(function () {
                ele.attr('datas', parseInt(ele.attr('datas')) + 1);
                chargement(ele);
            });
        }

        function chargement(ele) {
            var action= ele.attr('action');
            ele.find('.body').addClass('working');
            $.ajax({
                url: 'controlleur/calendrierControl.php',
                method: 'GET',
                data: {s: ele.attr('datas'), prof: ele.attr('dataid'), duree: ele.attr('dataduree')},
                dataType: 'json',
                success: function (rep) {

                    var tab = "<table class='table'><tr>";
                    $.each(rep, function (i, v) {
                        tab += "<th><div>" + i + "</div><div>" + v.date + "</div></th>";
                    });
                    tab += "</tr><tr>";
                    $.each(rep, function (i, v) {
                        tab += "<td>";

                        $.each(v.evenement, function (i, e) {
                            if (!e) {
                                tab += "<div><a style='color:#4ba4e0' href='"+action+"heur=" + i + "&date=" + v.date + "&prof=" + ele.attr('dataid') + "'>" + i + "</a></div>";
                            }
                        });
                        tab += "</td>";

                    });
                    tab += "</tr></table>";
                    ele.find('.body').html(tab);
                    ele.find('.body').removeClass('working');
                }
            });
        }
    })(jQuery);

