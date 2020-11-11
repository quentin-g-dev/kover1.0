<nav id="nav"
    class="d-none d-md-flex mt-2 mb-3 flex-column flex-md-row flex-no-wrap border-white justify-content-center align-items-center">
    <select name="selectLang" id="selectLang" class="selectLang my-3 my-lg-3">
        <option value="">
            <?if(isset($_SESSION['vip']['langCode'])){echo $_SESSION['vip']['langCode'];}else if(isset($_SESSION['langCode'])){echo $_SESSION['langCode'];} else {echo'FR';}?>
        </option>
        <option value="FR">FR</option>
        <option value="ES">ES</option>
        <option value="EN">EN</option>
    </select>
    <input type="hidden" name="langInput" id="langInput" value="<?php echo $_SESSION['langCode'];?>">

    <?php
    if (isset ($vip)){
            // FOR CONNECTED USERS :
            include './php/parts/allpages_parts/nav_inner_connected.php';

    } else {
        // FOR UNCONNECTED USERS :
        include './php/parts/allpages_parts/nav_inner_unconnected.php';

    } 
?>
</nav>