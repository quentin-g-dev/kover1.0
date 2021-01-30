<template>

  <div id="kover" class="bg-kover">
    <Header userConnected='' />
    <Home />
  </div>

</template>

<script>
import Header from './components/Header.vue'
import Home from './components/Home.vue'

export default {
  name: 'App',
  components: {
    Home,
    Header
  }
}
</script>

<style lang="scss">

@font-face {
    font-family: 'raleway';
    src: url('./assets/fonts/Raleway/Raleway-VariableFont_wght.ttf');
}

@font-face {
    font-family: 'open-sans';
    src: url('./assets/fonts/Open_Sans/OpenSans-Regular.ttf');
}

@font-face {
    font-family: 'raleway-bold';
    src: url('./assets/fonts/Raleway/static/Raleway-Bold.ttf');
}

* {
    box-sizing: border-box;
}

body {
    font-family: 'raleway', Helvetica;
    padding: 0px;
}

html {
    min-height: 100vh;
}

h1 {
    font-family: 'raleway-bold', Impact !important;
}

main {

    background-color: #fcf7f9;
}

.modal-content {
    background-color: transparent !important;
    border: none !important;
}

.modal-backdrop.show {
    opacity: 0.9 !important;
    background-color: #010101;
}

#koverProj {
    min-height: 68vh;
}

.bg-kover {
    background: rgb(2, 63, 98);
    background: -moz-linear-gradient(rgba(2, 63, 98, 1) 0%, rgba(3, 105, 163, 1) 78%);
    background: -webkit-linear-gradient(rgba(2, 63, 98, 1) 0%, rgba(3, 105, 163, 1) 78%);
    background: linear-gradient(rgba(2, 63, 98, 1) 0%, rgba(3, 105, 163, 1) 78%);
}

.bg-blue {
    background-color: #023f62;
}


.bg-greensheen {
    background: #7eb09b;
}

.bg-snow {
    background: #fcf7f9;
}

.bg-darkred {
    background: #8d0801;
}

.bg-marigold {
    background: #eca400;
}

.bg-hover-marigold:hover {
    color: #023f62;
    background-color: #eca400;
    border-color: #023f62;
}

.bg-hover-snow:hover {
    color: #023f62;
    background-color: #fcf7f8;
    border-color: #023f62;
}

.bg-hover-blue:hover {
    border-color: #fcf7f8;
    background-color: #023f62;
    color: #fcf7f8;
}

.text-greensheen {
    color: #7eb09b;
    border-color: #7eb09b;
}

.text-marigold {
    color: #eca400;
    border-color: #eca400;
}

.text-blue {
    color: #023f62;
    border-color: #023f62;
}

.text-snow {
    color: #fcf7f9;
    border-color: #fcf7f9;
}

.text-darkred {
    color: #8d0801;
    border-color: #8d0801;
}

.text-kover {
    color: #035a8c;
    border-color: #035a8c;
}

.cursor-pointer {
    cursor: pointer;
}

a,
a:active,
a:hover {
    text-decoration: none;
    color: inherit;
}

</style>
