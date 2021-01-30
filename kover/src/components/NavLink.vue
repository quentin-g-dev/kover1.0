<template>

  <a :href="href" class="d-flex flex-column justify-content-center align-items-center col-md-6 text-center my-5 my-md-3 display-5 font-weight-bold text-snow row col-md-4 w-auto px-0">
    <span class="mr-3">
      <img :src="imageSource" :alt="imageAlt">                           
    </span>
    <span>{{ text }}</span>
  </a>
          
</template>

<script>

export default {
  name: 'NavLink',
  components: {
  },
  props: {
    text : {
      type : String,
      required : true
    },
    href : {
      type : String,
      default : '#'
    },
    imageSource : {
      type : String,
      default : ""
    },
    imageAlt : {
      type : String,
      default : ""
    },
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">


</style>
