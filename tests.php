<?php

session_start();

$pageTitle = 'Tests KOVER';

include './php/parts/allpages_parts/head.php';
include './php/classes/UsersManagerTest.php';
include './php/classes/User.php';

$test = new UsersManagerTest();

?>

    <body>
    <h1 class="text-center text-kover">Tests  KOVER</h1>
    <main>

            <!--testAddUser-->
            <section>
                <h2 class="bg-kover text-snow text-center">testAddUser</h2>
                <?php 
                $testUser = new User();
                $testUser-> setUserName('testnouvelutilisateur');
                $testUser-> setUserHashedPassword(hash("whirlpool", 'testnouvelutilisateur'));
                $testUser->setUserCreationDate(date('Y-m-d H:i:s'));
                $testUser->setUserStatus('test-user');
                $testUser->setLangCode('FR');
                ?>
                <p class="bg-info text-snow text-center">
                    INPUT : 
                    <br>
                    <?= var_dump ($testUser); ?>
                    <br><br>
                    EXPECTED :
                    <br>
                    1
                </p>
                <?php 
                $addingResult = $test->testAddUser($testUser);

                if($addingResult===1) { 
                ?>

                <p class="bg-success text-snow text-center">
                    OUTPUT : 
                    <br>
                    <?= var_dump($addingResult)?> 
                    <br>
                    <br>
                    <b>OK</b>
                </p>
                <?php } else { ?>
                <p class="bg-alert text-snow text-center">
                    OUTPUT : <?= var_dump($addingResult)?> 
                    <br>
                    <b>FAILED</b>
                </p>
                <?php  }   ?>
            </section>
            
           <!--testHydrateUser-->
           <section>
                <h2 class="bg-kover text-snow text-center">testHydrateUser</h2>
                <?php 
                $dryUser = new User();
                $dryUser->setUserName("testnouvelutilisateur");
                $dryUser-> setUserHashedPassword(hash("whirlpool", 'testnouvelutilisateur'));
                ?>
                <p class="bg-info text-snow text-center">
                    INPUT : 
                    <br>
                    <?= var_dump ($dryUser); ?>
                    <br>
                    <br>
                    EXPECTED :
                    <br>
                    'test-user'
                </p>
                <?php 
                $readingResult = $test->testHydrateUser($dryUser); 

                if($readingResult === "test-user") { 
                ?>

                <p class="bg-success text-snow text-center">
                    OUTPUT : 
                    <br>
                    <?= var_dump($readingResult)?> 
                    <br>
                    <br>
                    <b>OK</b>
                </p>
                <?php } else { ?>
                <p class="bg-alert text-snow text-center">
                    OUTPUT : <?= var_dump($readingResult)?> 
                    <br>
                    <b>FAILED</b>
                </p>
                <?php  }   ?>
        </section>

        <!--testUpdateUser-->
        <section>
                <h2 class="bg-kover text-snow text-center">testUpdateUser</h2>
                <?php 
                $dryUser->setUserName('updatedUser');
                ?>
                <p class="bg-info text-snow text-center">
                    INPUT : 
                    <br>
                    <?= var_dump ($dryUser); ?>
                    <br>
                    EXPECTED :
                    <br>
                    true
                  
                </p>
                <?php 
                
                if($test->testUpdateUser($dryUser)) { 
                ?>
                <p class="bg-success text-snow text-center">
                    OUTPUT : 
                    <br>
                    <?= var_dump($updatingResult)?> 
                    <br>
                    <br>
                    <b>OK</b>
                </p>
                <?php } else { ?>
                <p class="bg-alert text-snow text-center">
                    OUTPUT : <?= var_dump($test->testUpdateUser($dryUser))?> 
                    <br>
                    <b>FAILED</b>
                </p>
                <?php  }   ?>
        </section>

         <!--testDeleteUser-->
         <section>
                <h2 class="bg-kover text-snow text-center">testUpdateUser</h2>
                <p class="bg-info text-snow text-center">
                    INPUT : 
                    <br>
                    <?= var_dump ($dryUser); ?>
                    <br>
                    EXPECTED :
                    <br>
                    true
                </p>
                <?php 
                
                if($test->testDeleteUser($dryUser)) { 
                ?>
                <p class="bg-success text-snow text-center">
                    OUTPUT : 
                    <br>
                    <?= var_dump($test->testDeleteUser($dryUser))?> 
                    <br>
                    <br>
                    <b>OK</b>
                </p>
                <?php } else { ?>
                <p class="bg-alert text-snow text-center">
                    OUTPUT : <?= var_dump($test->testDeleteUser($dryUser))?> 
                    <br>
                    <b>FAILED</b>
                </p>
                <?php  }   ?>
        </section>
            
    </main>
  
    </body>
</html>