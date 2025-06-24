<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <?php 
        $sql = mysqli_query($conn, "SELECT * FROM tabmenu");
        while($row = mysqli_fetch_array($sql)){
        ?>
            <li class="nav-item active">
                <?php if(!empty($row['name'])){
                ?>
                <a class="nav-link" href="<?php echo $row['name'];?>.php"><?php echo $row['label'];?><span class="sr-only"></span></a>
                </li>
            </li>
            <?php }else{ ?> 
                <a class="nav-link" href="index.php"><?php echo $row['label'];?><span class="sr-only"></span></a>
            </li>
            <?php } ?>
        <?php } ?>
        </ul>
        <
    </div>
</nav>