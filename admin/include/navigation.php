<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
    <!-- TOGGLE NAVIGATION -->
    <li class="xn-icon-button">
        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
    </li>
    <!-- END TOGGLE NAVIGATION -->
    <!-- SEARCH -->
    <li class="xn-search">
        <form role="form">
            <input type="text" name="search" placeholder="Search..."/>
        </form>
    </li>   
    <!-- END SEARCH -->
    <!-- SIGN OUT -->
    <li class="xn-icon-button pull-right">
        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
    </li> 
    <!-- END SIGN OUT -->
    <!-- MESSAGES -->
    <li class="xn-icon-button pull-right">
        <a href="#"><span class="fa fa-comments"></span></a>
        <div class="informer informer-danger"><span class="nombre_msg"></span></div>
        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                <div class="pull-right">
                    <span class="label label-danger"><span class="nombre_msg"></span> new</span>
                </div>
            </div>
            <div class="panel-body list-group list-group-contacts scroll body_msg" style="height: 200px;">


            </div>     
            <div class="panel-footer text-center">
                <a href="messages">Afficher tous les messages</a>
            </div>                            
        </div>                        
    </li>
    <!-- END MESSAGES -->
    <!-- TASKS -->
    <li class="xn-icon-button pull-right">
        <a href="#"><span class="fa fa-bell"></span></a>
        <div class="informer informer-warning"><span class="nombre_notif"></span></div>
        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-bell"></span> Notification</h3>                                
                <div class="pull-right">
                    <span class="label label-warning"><span class="nombre_notif"></span> active</span>
                </div>
            </div>
            <div class="panel-body list-group scroll body_notif" style="height: 200px;">                                

            </div>     
            <div class="panel-footer text-center">
                <a href="notifications">Afficher tous les notifications</a>
            </div>                            
        </div>                        
    </li>
    <!-- END TASKS -->
</ul>