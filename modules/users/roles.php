<?php
include('../../includes/top_header.php');
include('../../includes/header.php');
include('../../includes/sidebar.php');
?>


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <?php include('../../includes/navbar.php'); ?>
            <div class="container card" style="padding: 15px; margin-top:15px;">
                <div class="row">
                    <div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Add</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="addForm" method="post">
                                            <div class="form-group">
                                                <label>Role Name</label>
                                                <input type="text" name="role" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Modules</label>
                                                <select class="js-example-basic-multiple form-control" name="modules[]" multiple="multiple" style="width:100%">
                                                    <?php 
                                                        $sql= "select * from modules";
                                                        $run = mysqli_query($conn,$sql);
                                                        while($row = mysqli_fetch_array($run)){

                                                    ?>
                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['label'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                            
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>Save changes</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <table id="example" class="display">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Role</th>
                        <th>Permission</th>
                        <th>Action</th>
                    </tr>
                </thead>
        <tbody>
            <?php 
                $sql = "select * from roles";
                $run = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_array($run)){

                ?>
                
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['role']?></td>
                <td>
                    <?php 
                        if(!empty($row['module_id'])){
                            $module_ids = json_decode($row['module_id']);
                            $ids = implode(',', array_map('intval', $module_ids));
                            $badge_sql = mysqli_query($conn, "SELECT label FROM modules WHERE id IN ($ids)");
                            while($badge_row = mysqli_fetch_array($badge_sql)){
                                echo '<span class="badge badge-pill badge-primary">'.$badge_row['label'].'</span>';
                            }
                        }
                    ?>
                </td>
                <td>
                    <button class="btn btn-primary" aria-hidden="true" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>"><i class="fa fa-pencil-square-o"></i>Edit</button>

                    <!-- Edit Modal -->
                        <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="editForm<?php echo $row['id']; ?>" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <div class="form-group">
                                                <label>Role Name</label>
                                                <input type="text" name="role" value="<?php echo $row['role']; ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Modules</label>
                                                <select class="js-example-basic-multiple form-control" name="modules[]" multiple="multiple" style="width:100%">
                                                <?php 
                                                    $selected_modules = [];
                                                    if(!empty($row['module_id'])){
                                                        $selected_modules = json_decode($row['module_id']);
                                                    }
                                                    $moduleSql= "select * from modules";
                                                    $moduleRun = mysqli_query($conn,$moduleSql);
                                                    while($moduleRow = mysqli_fetch_array($moduleRun)){

                                                        $selected = in_array($moduleRow['id'], $selected_modules);

                                                        if($selected){
                                                            $selected="selected";
                                                        } else {
                                                            $selected= "";
                                                        }
                                                    ?>
                                                    <option value="<?php echo $moduleRow['id'];?>" <?php echo $selected; ?>><?php echo $moduleRow['label'];?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>Update</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                    
                                </div>
                                </div>
                            </div>
                        </div>

                    <button class="btn btn-danger deletebutton" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash-o"></i>Delete</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Role</th>
                <th>Permission</th>
                <th>Action</th>

            </tr>
        </tfoot>
    </table>
    </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <script type="text/javascript" src="roles/scripts.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            });
        </script>
        
<?php
include('../../includes/footer.php');
?>