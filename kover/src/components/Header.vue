<template>

  <header class="md-row container full-container flex-column flex-md-row text-snow d-flex justify-content-between justify-content-md-between align-items-center p-0 mt-2 mb-3">
    <div class="siteHeader p-0 d-flex justify-content-between align-items-baseline col-md-6 col-lg-8">
      <a href="../index.php">
        <p class="col-md-6 p-0 d-inline text-snow display-5 font-weight-bold display-4">KOVER</p>
      </a>
      <!--Hamburger-->
      <span class="text-snow hamburger d-flex d-md-none display-4">&#9776;</span>
    </div>

    <!--NAV MENU -->
    <nav id="nav" v-if="userConnected===true" class="d-md-flex md-row w-md-25 mt-3 my-md-0 flex-column flex-md-row justify-content-md-end justify-content-start align-items-md-center align-items-start d-none col-md-6 col-lg-4 px-0">
      <div class="w-100 d-flex h-100 flex-column flex-md-row connectedNav justify-content-md-end align-items-md-center justify-content-around align-items-center">
        <span class="userMenu  md-row flex-md-row flex-column w-md-auto w-100 justify-content-md-end justify-content-center align-items-md-center align-items-center h-100 d-flex">
          <NavLink text="Nouveau projet" href="home/" imageSource="../assets/icons/backarrow.svg" imageAlt="go" />
          <span class="avatar d-none d-md-inline p-0" onclick="toggleUserOptions();">
            <img src="../assets/icons/userprofile.svg" alt="user" id="connected">
          </span>
          <div class="userOptions d-flex d-md-none flex-column bg-transparent text-snow">
            <NavButton text="Mon Espace" href="profile/" />
            <NavButton text="Mes Lettres" href="letters/" />
            <NavButton text="Mes Paramètres" href="param/" />
            <NavButton text="Déconnexion" href="disc/" />
            <div class="bg-marigold my-2 border text-snow p-1 rounded">
              <LangSelector />
            </div>
          </div>
        </span>
      </div>
    </nav>

    <nav id="nav" v-else class="d-md-flex md-row w-md-25 mt-3 my-md-0 flex-column flex-md-row justify-content-md-end justify-content-start align-items-md-center align-items-start d-none col-md-6 col-lg-4 px-0">
      <div class="w-100 d-flex h-100 flex-column flex-md-row  justify-content-md-end align-items-md-center justify-content-center align-items-center h-100">
        <span class="userMenu d-md-flex md-row flex-md-row flex-column w-md-auto w-100 justify-content-md-end justify-content-center align-items-md-center align-items-center  d-flex">
          <LangSelector />
          <span class="col-lg-1"></span>
          <NavLink text="Nouveau projet" href="home/" imageSource="../assets/icons/eamark.svg" imageAlt="go" />
          <span class="avatar col-md-3 d-none d-md-flex justify-content-center my-5 my-md-3 p-0" onclick="toggleUserOptions();">
            <img src="../assets/icons/userprofile.svg" alt="profile">                           
          </span>
          <div class="userOptions rounded px-3 py-1 d-flex d-md-none flex-column justify-content-center align-items-center bg-transparent">
            <button type="button" class="btn bg-marigold text-snow d-flex my-2  font-weight-bold" data-toggle="modal" data-target="#connectModal" id="signInButton">
              <span class="mr-3">
                <img src="../assets/icons/connectkey.svg" alt="connect">                           
              </span>
                <span>Connexion</span>
            </button>
            <button type="button" class="btn bg-marigold text-snow d-flex my-2  font-weight-bold" data-toggle="modal" data-target="#subscriptionModal" id="signUpButton">
              <img src="../assets/icons/userprofile.svg" alt="profile">                           
                <span>Inscription</span>
            </button>
          </div>
        </span>
      </div>
    </nav>
    
  </header>
  
</template>

<script>
import NavButton from './NavButton.vue'
import NavLink from './NavLink.vue'
import LangSelector from './LangSelector.vue'

export default {
  name: 'Header',
  components: {
    NavButton,
    NavLink,
    LangSelector
  },
  props: {
    userConnected : {
      type : Boolean,
      default : false
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

header {
  height: 12vh;
}

nav {
  height: 7vh;
}

nav option {
  background-color: rgb(2, 63, 98) !important;
  color: #fff;
  text-align: center;
}

nav .avatar {
  cursor: pointer;
}

nav .userOptions {
  position: absolute;
  top: 6vh;
  right: 0.5vw;
  z-index: +3;
}

nav a:hover {
  color: #fcf7f9;
}

@media (max-width:768px) {

  header {
    height: auto;
  }

  nav {
    height: 86vh;
    border: 2px solid white;
    border-radius: 15px;
  }

  nav .userOptions {
    right: auto;
    position: static;
    top: auto;
    border: none;
    border-radius: 0px;
    background-color: inherit;
  }

}

</style>
