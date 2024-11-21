<header>
    <div class="logo">
        <img src="../image/logo.png" width="200">
    </div>
    <div class="right">
        <div class="bx bxs-user" id="user-btn"></div>
        <div class="toggle-btn" ><i class="bx bx-menu"></i></div>
    </div>
    <div class="profile">
        <?php 
            $select_profile = $conn->prepare("SELECT * FROM 'seller' WHERE id = ?");
            $select_profile->execute([$seller_id]);

            if($select_profile->rowCount() > 0){
                $fetch_profile = $select_profile->fetch(PDO:FETCH_ASSOC);
            

        ?>
        <div class="profile">
            <img src="../uploaded_file/<?=$fetch_profile['image']; ?>" class="logo-img" width="100">
            <p><?=$fetch_profile['name']; ?></p>

            <div class="flex-btn">
                <a htef="profile.php" class="btn">profile</a>
                <a htef="../components/admin_logout.php"  onclick="return confirm('log out from this website');" class="btn">logout</a>

            </div>

        </div>
        <?php } ?>

    </div>

</header>
<div class="sidebar-container">
    <div>
        <?php 
            $select_profile = $conn->prepare("SELECT * FROM 'seller' WHERE id = ?");
            $select_profile->execute([$seller_id]);

            if($select_profile->rowCount() > 0){
                $fetch_profile = $select_profile->fetch(PDO:FETCH_ASSOC);
            

        ?>
        <div class="profile">
            <img src="../uploaded_file/<?=$fetch_profile['image']; ?>" class="logo-img" width="100">
            <p><?=$fetch_profile['name']; ?></p>

            

        </div>
        <?php } ?>

    </div>

    </div>

</div>