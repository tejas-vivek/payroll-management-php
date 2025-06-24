        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <div>
                    <form action="#">
                            <input type="text" class="form-control" placeholder="Search">
                        </form>
                </div>
                <ul class="metismenu" id="menu">
                    <?php 
                        $query="select * from modules order by sort";
                        $run = mysqli_query($conn, $query);
                        $modules = array();
                        while($row = mysqli_fetch_array($run)){ 
                            $modules[$row['menu']][]= $row;  
                        }
                        $currentSegment = basename(trim($_SERVER['REQUEST_URI'], '/'));

                        foreach($modules as $key => $value){
                            $isActive = false;
                            foreach($value as $item){
                                if($currentSegment == $item['module']){
                                    $isActive = true;
                                    break;
                                }
                            }
                            ?>

                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="<?php echo $isActive? 'true' : 'false' ?>">
                                <i class="fa <?php echo $value[0]['icon']?>"></i><span class="nav-text"><?php echo $key;?></span>
                            </a>
                            <?php for($i=0; $i<count($value); $i++){ ?>
                            <ul aria-expanded="true" class="<?php echo $isActive? 'collapse in' : '' ?>">
                                <li><a class="<?php echo ($value[$i]['module'] == $currentSegment) ? 'active' : '' ?>" href="http://localhost:8080/payroll/modules/<?php echo $value[$i]['module']; ?>"><?php echo $value[$i]['label']?></a></li>
                            </ul>
                            <?php } ?>
                        </li>
                    <?php } ?>
                    
                    <!-- <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-cog" aria-hidden="true"></i><span class="nav-text">Settings</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost:8080/payroll/modules/users/index.php">Users</a></li>
                           
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->