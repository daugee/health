<div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
         
                    <a class="brand" href="index.html">Hospital Management System</a>
            

            <ul class="nav pull-right">                
                
                
                <li class="dropdown">
                    <a href="index.html#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                        <?php echo $name;?>  account
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="personal-info.html"> <?php echo $name;?> Profile</a></li>
                        <li><a href="<?php echo site_url('welcome/logout');?>">Logout</a></li>
                        
                    </ul>
                </li>
                
            </ul>            
        </div>
    </div>